<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('AppController', 'Controller');

class CouponsController extends AdminAppController {

    public $helpers = array('Html', 'Form');
    public $name = 'Coupons';
    public $uses = array('Admin.Coupon');

    public function index() {
        $this->setMenuItems();
        $this->render('index');
    }

    public function add() {
        $this->setMenuItems();
        $this->render('add');
    }

}
