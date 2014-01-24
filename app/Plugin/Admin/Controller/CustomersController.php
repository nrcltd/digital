<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class CustomersController extends AdminAppController {

    public $helpers = array('Html', 'Form');
    public $name = 'Customers';
    public $uses = array('Admin.Order');

    public function index() {
        $productkey = $this->request->query('product');
        $email = $this->request->query('email');

        $this->loadModel('Product');
        $products = $this->Product->find('all');

        $orders = $this->Order->searchOrders($productkey, $email);
        $productname = 'Product filter';
        if (!empty($productkey)) {
            $productstemp = $this->Product->findById($productkey);
            if (!empty($productstemp)) {
//                debug($productstemp);

                $productname = $productstemp['Product']['product_name'];
            }
        }
        $this->set('productname', $productname);
        $this->set('product', $productkey);
        $this->set('email', $email);
//        debug($orders);
        $this->set('orders', $orders);
        $this->set('products', $products);
        $this->setMenuItems();
        $this->render('index');
    }

    public function export() {
        $productkey = $this->request->query('product');
        $email = $this->request->query('email');

        $orders = $this->Order->getExportedOrder($productkey, $email);
//        debug($orders);

        $this->Export->exportCsv($orders, "customers_export_" . date("Y-m-d") . ".csv");
//        die();
    }

    public function sendinvoice() {
        if ($this->Session->check('User')) {
            if ($this->request->isPost()) {
                $orderid = $this->request->data['orderid'];
//            $orderid = 62;
                $order = $this->Order->findById($orderid);

                $this->loadModel('Option');
                $option = $this->Option->findByOptionName('smtp_host');
                $smtp_host = '';
                if ($option) {
                    $smtp_host = $option['Option']['option_value'];
                }

                $option = $this->Option->findByOptionName('smtp_port');
                $smtp_port = '';
                if ($option) {
                    $smtp_port = $option['Option']['option_value'];
                }

                $option = $this->Option->findByOptionName('smtp_user');
                $smtp_user = '';
                if ($option) {
                    $smtp_user = $option['Option']['option_value'];
                }

                $option = $this->Option->findByOptionName('smtp_password');
                $smtp_password = '';
                if ($option) {
                    $smtp_password = $option['Option']['option_value'];
                }

                $smtp_test_user = $order['Order']['customer_email'];

                $option = $this->Option->findByOptionName('use_php_email');
                $use_php_email = '';
                if ($option) {
                    $use_php_email = $option['Option']['option_value'];
                }
                
                $option = $this->Option->findByOptionName('smtp_tls');
                $smtp_tls = false;
                if ($option) {
                    $tempvalue = $option['Option']['option_value'];
                    if ($tempvalue == '1') {
                        $smtp_tls = true;
                    }
                }
                
                $gmail = array();
                if ($use_php_email === '0') {
                    $gmail = array(
                        'host' => $smtp_host,
                        'port' => $smtp_port,
                        'username' => $smtp_user,
                        'password' => $smtp_password,
                        'transport' => 'Smtp',
                        'tls' => $smtp_tls,
                        'timeout' => 30,
                        'client' => null,
                        'log' => false,
                    );
                } else {
                    $gmail = array(
                        'transport' => 'Mail',
                        'from' => $smtp_user,
                            //'charset' => 'utf-8',
                            //'headerCharset' => 'utf-8',
                    );
                }

                $email = new CakeEmail($gmail);
                $email->template('default', 'default');
                $email->emailFormat('html');
                $email->to($smtp_test_user);
                $email->from($smtp_user);

                $product_id = $order['Order']['product_id'];
                $this->loadModel('Product');
                $product = $this->Product->findById($product_id);

                $email->subject('Invoice: #' . $order['Order']['id'] . ' - Buy ' . $product["Product"]['product_name'] . ' - ' . $order['Order']['customer_name']);

                $this->loadModel('Token');
                $tokenp = $this->Token->findByOrderId($order['Order']['id']);
                $content = $order['Order']['id'] . '\n' . $order['Order']['purchased_date'] .
                        '\n' . $product["Product"]['id'] . '\n' . $product["Product"]['product_name']
                        . '\n' . $product["Product"]['product_price'] .
                        '\n' . $order['Order']['customer_name'] .
                        '\n' . $order['Order']['customer_email'].
                        '\n' . $order['Order']['id'] . '\n' . $tokenp['Token']['token_code'];
                try {
                    if ($email->send($content)) {
                        $result = array();
                        $result['result_code'] = '1';
                        echo json_encode($result);
                    } else {
                        $result = array();
                        $result['result_code'] = '-1';
                        echo json_encode($result);
                    }
                } catch (Exception $ex) {
                    $result = array();
                    $result['result_code'] = '-1';
                    echo json_encode($result);
                }
            }
        }
        exit();
    }

}
