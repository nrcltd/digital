<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('AppController', 'Controller');

class SettingController extends AdminAppController {

    public $helpers = array('Html', 'Form');
    var $name = 'Setting';
    public $uses = array('Admin.Setting', 'Admin.Theme');

    public function index() {
//        debug($this->Option);
        $this->loadModel('Option');
        if ($this->request->isPost()) {

            $setting = $this->request->data['Setting'];
//            debug($setting);
            foreach (array_keys($setting) as $key) {
//                debug($setting[$key]);

                $option = $this->Option->findByOptionName($key);
//                $id = $option['Option']['id'];

                $this->Option->updateAll(
                        array('Option.option_value' => '\'' . $setting[$key] . '\''), array('Option.option_name' => $key)
                );

//                $this->Option->Id = $id;
//                $this->Option->saveField('option_value', $setting[$key]);
//                debug($id . $this->Option->saveField('option_value', $setting[$key]));
            }
        }

        $options = $this->Option->find('all');
//        debug($options);

        for ($index = 0; $index < count($options); $index++) {
            $op = $options[$index];
            $this->set($op['Option']['option_name'], $op['Option']['option_value']);
        }

        $option = $this->Option->findByOptionName('frontend_theme');
        $frontend_theme = '';
        if ($option) {
            $frontend_theme = $option['Option']['option_value'];
        }

        $themes = $this->Theme->find('all');
        $th = $this->Theme->findById($frontend_theme);
        $this->set('theme_selector', ($th['Theme']['theme_name']));
        $this->setMenuItems();
        $this->set('themes', $themes);
        $this->render('index');
    }

    public function updatepassword() {
        if ($this->Session->check('User')) {
            if ($this->request->isPost()) {
                $newpassword = $this->request->data('password');
                $userid = $this->Session->read('UserID');

                $this->loadModel('User');
                $this->User->id = $userid;
                $data = array('id' => $userid, 'password' => md5($newpassword));
                $this->User->save($data);

//                debug(md5($newpassword));
            }
        }
        exit();
    }

    public function updateavatar() {
        if ($this->Session->check('User')) {
            if ($this->request->isPost()) {
                $this->loadModel('Option');
//                debug($this->request);
                $imageid = $this->request->data('imageid');
                $this->Option->updateAll(
                        array('Option.option_value' => '\'' . $imageid . '\''), array('Option.option_name' => 'seller_photo')
                );
                
//                debug($imageid);
            }
        }
        exit();
    }

}
