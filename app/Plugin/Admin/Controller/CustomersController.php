<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('AppController', 'Controller');

class CustomersController extends AdminAppController {

    public $helpers = array('Html', 'Form');
    public $name = 'Customers';
    public $uses = array('Admin.Order');

    public function index() {
        $this->setMenuItems();
        $this->render('index');
    }

}
