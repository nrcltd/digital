<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('AppController', 'Controller');

class ProductsController extends AdminAppController {

    public $helpers = array('Html', 'Form');
    public $name = 'Products';
    public $uses = array('Admin.Product');

    public function index() {
        $products = $this->Product->find('all');
//        debug($products);
        $this->set('products', $products);
        $this->setMenuItems();
        $this->render('index');
    }

    public function add() {
        $this->setMenuItems();
        $this->render('add');
    }

    public function edit($id = null) {
        $products = $this->Product->findById($id);
        $this->set('products', $products);
//        debug($products);
        $this->setMenuItems();
        $this->render('edit');
    }

}
