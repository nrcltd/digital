<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('AppController', 'Controller');

class SettingController extends AdminAppController {

    public $helpers = array('Html', 'Form');
    var $name = 'Setting';
    public $uses = array('Admin.Setting', 'Admin.Theme');

    public function index() {
//        debug($this->Option);
        $this->setMenuItems();
        $this->set('themes', $this->Theme->find('all'));
        $this->render('index');
    }

}
