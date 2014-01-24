<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');
App::uses('Validation', 'Utility');
App::uses('CakeEmail', 'Network/Email');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class OrdersController extends AppController {

    public $helpers = array('Html', 'Form', 'PaypalIpn.Paypal');

    public function index() {
        $this->layout = 'error404';
        $this->render('index');
    }

    public function add() {
        $data = $this->request->data;
        $result = $this->Order->addOrder($data);
        if ($result == false) {
            $this->index();
            return;
        } else {
            $freeproduct = false;
            $order = $this->Order->findOrder($result['id'], $result['token']);
            $discount = 0;
            $couponcode = $order['Order']['coupon_code'];
            $this->loadModel('Coupon');
            if (!empty($couponcode)) {

                $discount = $this->Coupon->getDiscount($couponcode, $data['Order']['product_id']);
            }
            $this->loadModel('Product');
            $product = $this->Product->findById($data['Order']['product_id']);

            $pricefinal = $product['Product']['product_price'] - $discount;
            if ($pricefinal <= 0) {
                $freeproduct = true;

                if ($discount > 0) {
                    $this->Coupon->updatequantitycoupon($couponcode, $data['Order']['product_id']);
                }

                $this->sendorder($result['id'], $result['token']);
            }
            if ($freeproduct == true) {
                $this->Order->updateOrder('paid', $result['id']);
                return $this->redirect(
                                array(
                                    'action' => 'bought'
                ));
            } else {
                return $this->redirect(
                                array(
                                    'action' => 'invoice',
                                    '?' => array(
                                        'id' => $result['id'],
                                        'token' => $result['token'])
                ));
            }
        }
    }

    function sendorder($orderid, $token) {

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
        $email->template('download', 'default');
        $email->emailFormat('html');
        $email->to($smtp_test_user);
        $email->from($smtp_user);

        $product_id = $order['Order']['product_id'];
        $this->loadModel('Product');
        $product = $this->Product->findById($product_id);

        $email->subject('Download file: ' . $product["Product"]['product_name']);


        $content = $order['Order']['id'] . '\n' . $token;
        try {
            $email->send($content);
        } catch (Exception $ex) {
            
        }
    }

    public function download() {

        $orderid = $this->request->query['id'];
        $tokencode = $this->request->query['token'];
        if (empty($orderid)) {
            $this->index();
            return;
        }
        if (empty($tokencode)) {
            $this->index();
            return;
        }

        $order = $this->Order->findPaidOrder($orderid, $tokencode);
        if ($order == false) {
            $this->index();
            return;
        }
        $product_id = $order['Order']['product_id'];

        $this->loadModel('Product');
        $product = $this->Product->findById($product_id);
        if ($product == false) {
            $this->index();
            return;
        }

        $productfileid = $product['Product']['product_file_id'];
        $this->loadModel('ProductFile');
        $productfile = $this->ProductFile->findById($productfileid);

        $filepro = $productfile['ProductFile'];
        $folder = 'upload';
        $rootfolder = WWW_ROOT . 'img' . DS . $folder;
        $file_path = $rootfolder . DS . $filepro['product_file_year']
                . DS . $filepro['product_file_month']
                . DS . $filepro['product_file_day']
                . DS . $filepro['product_file_name'] . $filepro['product_file_extension'];
        $this->autoRender = false;
        $ext = substr($filepro['product_file_extension'], 1, strlen($filepro['product_file_extension']) - 1);
        $this->response->file($file_path);
        $this->response->download($filepro['product_file_description']);
        return $this->response;
    }

    public function bought() {
        $this->loadModel('Option');
        $option = $this->Option->findByOptionName('frontend_theme');
        $optionCode = 'spring';
        if ($option) {
            $optionValue = $option['Option']['option_value'];
            $this->loadModel('Theme');
            $theme = $this->Theme->findById($optionValue);
            if ($theme) {
                $optionCode = $theme['Theme']['theme_code'];
            }
        }
        $this->set('theme', $optionCode);
    }

    public function invoice() {

        $this->loadModel('Option');
        $option = $this->Option->findByOptionName('frontend_theme');
        $optionCode = 'spring';
        if ($option) {
            $optionValue = $option['Option']['option_value'];
            $this->loadModel('Theme');
            $theme = $this->Theme->findById($optionValue);
            if ($theme) {
                $optionCode = $theme['Theme']['theme_code'];
            }
        }
        $option = $this->Option->findByOptionName('seller_paypal_account');
        $seller_paypal_account = '';
        if ($option) {
            $seller_paypal_account = $option['Option']['option_value'];
        }

        $this->set('seller_paypal_account', $seller_paypal_account);
        $orderid = $this->request->query['id'];
        $tokencode = $this->request->query['token'];
        if (empty($orderid)) {
            $this->index();
            return;
        }
        if (empty($tokencode)) {
            $this->index();
            return;
        }

        $order = $this->Order->checkOrder($orderid, $tokencode);
        $this->set('theme', $optionCode);
        if ($order == false) {
            $this->index();
            return;
        }
        $product_id = $order['Order']['product_id'];

        $discount = 0;
        $discountlabel = '---';
        $couponcode = $order['Order']['coupon_code'];
        if (!empty($couponcode)) {
            $this->loadModel('Coupon');
            $discount = $this->Coupon->getDiscount($couponcode, $product_id);
            if ($discount > 0) {
                $discountlabel = $discount;
            }
        }
        $this->loadModel('Product');
        $product = $this->Product->findById($product_id);
        $this->set('product', $product);

        $this->loadModel('Option');
        $option = $this->Option->findByOptionName('currency_code');
        $currencyCode = '$';
        if ($option) {
            $currencyCode = $option['Option']['option_value'];
        }
        $this->set('currencyccode', $currencyCode);
        $this->set('discount', $discount);
        $this->set('discountlabel', $discountlabel);
        $this->set('order', $order);
        $this->set('title_for_layout', 'Invoice #' . $order['Order']['id']);
    }

}
