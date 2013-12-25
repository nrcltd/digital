<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('AppController', 'Controller');

class ProductsController extends AdminAppController {

    public $helpers = array('Html', 'Form');
    public $name = 'Products';
    public $uses = array('Admin.Product');

    public function index() {
        $this->setMenuItems();
        $this->render('index');
    }

    public function add() {
        $this->setMenuItems();
        $this->render('add');
    }

}
