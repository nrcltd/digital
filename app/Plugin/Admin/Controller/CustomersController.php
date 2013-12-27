<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('AppController', 'Controller');

class CustomersController extends AdminAppController {

    public $helpers = array('Html', 'Form');
    public $name = 'Customers';
    public $uses = array('Admin.Order');

    public function index() {
        $this->loadModel('Product');
        $products = $this->Product->find('all');

        $orders = $this->Order->find('all');
//        debug($orders);
        $this->set('orders', $orders);
        $this->set('products', $products);
        $this->setMenuItems();
        $this->render('index');
    }

}
