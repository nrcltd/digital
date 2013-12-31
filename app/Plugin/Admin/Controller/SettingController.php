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
            foreach (array_keys($setting) as $key) {
//                debug($setting[$key]);

                $option = $this->Option->findByOptionName($key);
//                $id = $option['Option']['id'];

                $this->Option->updateAll(
                        array('Option.option_value' => '\''.$setting[$key].'\''), array('Option.option_name' => $key)
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

        $this->setMenuItems();
        $this->set('themes', $this->Theme->find('all'));
        $this->render('index');
    }

}
