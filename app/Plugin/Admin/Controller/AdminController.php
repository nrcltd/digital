<?php

App::uses('AdminAppController', 'Admin.Controller');

class AdminController extends AdminAppController {

    /**
     * Uses
     *
     * @var mixed
     */
    public $uses = null;

    /**
     * Index
     *
     * @return void
     */
    public function index() {
        $this->Redirect(array('controller' => 'dashboard', 'action' => 'index'));
    }

}
