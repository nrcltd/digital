<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('AppController', 'Controller');

class UsersController extends AdminAppController {

    var $name = 'Users';
    public $helpers = array('Html', 'Form');

    function login_form() {
        
    }

    function login() {
        $this->setMenuItems();
        if (empty($this->data['User']['username']) == false) {

            $user = $this->User->find('all', array('conditions' => array('User.username' => $this->data['User']['username'], 'User.password' => md5($this->data['User']['password']))));
            if ($user != false) {
                $this->Session->setFlash('Thank you for logging in!');
                $this->Session->write('User', $user);
                $this->Redirect(array('controller' => 'setting', 'action' => 'index'));
                exit();
            } else {
                $this->Session->setFlash('Incorrect username/password!', true);
                $this->Redirect(array('action' => 'login'));
                exit();
            }
        }
    }

    function logout() {

        $this->Session->destroy();
        $this->Session->setFlash('You have been logged out!');

        $this->Redirect(array('action' => 'login'));
    }

}
