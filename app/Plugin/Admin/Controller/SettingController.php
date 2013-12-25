<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('AppController', 'Controller');

class SettingController extends AdminAppController {

    public $helpers = array('Html', 'Form');
    var $name = 'Setting';
    public $uses = array('Admin.Option');

    public function index() {
//        debug($this->Option);
        $this->setMenuItems();
        $this->set('option', $this->Option);
        $this->render('index');
    }

}
