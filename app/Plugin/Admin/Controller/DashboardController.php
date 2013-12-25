<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('AppController', 'Controller');

class DashboardController extends AdminAppController {

    public $helpers = array('Html', 'Form');
    public $name = 'Dashboard';
    public $uses = array('Admin.Report');

    public function index() {
        $this->setMenuItems();
        $this->render('index');
    }

}
