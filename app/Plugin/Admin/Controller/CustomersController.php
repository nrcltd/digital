<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('AppController', 'Controller');

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

}
