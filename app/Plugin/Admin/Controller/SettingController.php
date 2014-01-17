<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class SettingController extends AdminAppController {

    public $helpers = array('Html', 'Form');
    var $name = 'Setting';
    public $uses = array('Admin.Setting', 'Admin.Theme');

    public function index() {
//        debug($this->Option);
        $this->loadModel('Option');
        if ($this->request->isPost()) {

            $this->Setting->set($this->request->data);
            if ($this->Setting->validates()) {
                $setting = $this->request->data['Setting'];
//            debug($this->request);
                $seller_password = $setting['seller_password'];
                $this->updatepassword($seller_password);
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

//            debug($this->Setting->validates());
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

        $option = $this->Option->findByOptionName('seller_photo');
        $user_photo_id = '';
        if (!empty($option)) {
            $user_photo_id = $option['Option']['option_value'];
        }
        $this->set("image_user_url", '');
        if (empty($user_photo_id)) {
            $this->set('hidephoto', 'none');
        } else {
            $this->set('hidephoto', 'block');
            $this->loadModel('Image');
            $imageinfo = $this->Image->findById($user_photo_id);
            $imagepart = $imageinfo['Image'];
            $image_user_url = $imagepart['image_year'] . '/' . $imagepart['image_month'] . '/' . $imagepart['image_day'] . '/' . 'resize_' . $imagepart['image_name'] . $imagepart['image_ext'];
            $this->set("image_user_url", $image_user_url);
        }
        $themes = $this->Theme->find('all');
        $th = $this->Theme->findById($frontend_theme);
        $this->set('theme_selector', ($th['Theme']['theme_name']));
        $this->setMenuItems();
        $this->set('themes', $themes);
        $this->render('index');
    }

    public function updatepassword($newpassword) {
        if ($this->Session->check('User')) {
            if ($this->request->isPost()) {
//                $newpassword = $this->request->data('password');
                $userid = $this->Session->read('UserID');

                $this->loadModel('User');
                $this->User->id = $userid;
                $data = array('id' => $userid, 'password' => md5($newpassword));
                $this->User->save($data);

//                debug(md5($newpassword));
            }
        }
//        exit();
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

    public function sendemail() {

        if ($this->Session->check('User')) {
            if ($this->request->isPost()) {

                $this->loadModel('Option');
                $option = $this->Option->findByOptionName('smtp_host');
                $smtp_host = '';
                if ($option) {
                    $smtp_host = $option['Option']['option_value'];
                }

                $option = $this->Option->findByOptionName('smtp_port');
                $smtp_port = '';
                if ($option) {
                    $smtp_port = $option['Option']['option_value'];
                }

                $option = $this->Option->findByOptionName('smtp_user');
                $smtp_user = '';
                if ($option) {
                    $smtp_user = $option['Option']['option_value'];
                }

                $option = $this->Option->findByOptionName('smtp_password');
                $smtp_password = '';
                if ($option) {
                    $smtp_password = $option['Option']['option_value'];
                }

                $option = $this->Option->findByOptionName('smtp_test_user');
                $smtp_test_user = '';
                if ($option) {
                    $smtp_test_user = $option['Option']['option_value'];
                }

                $option = $this->Option->findByOptionName('use_php_email');
                $use_php_email = '';
                if ($option) {
                    $use_php_email = $option['Option']['option_value'];
                }
                $gmail = array();
                if ($use_php_email === '0') {
                    $gmail = array(
                        'host' => $smtp_host,
                        'port' => $smtp_port,
                        'username' => $smtp_user,
                        'password' => $smtp_password,
                        'transport' => 'Smtp',
                        'tls' => true,
                        'timeout' => 30,
                        'client' => null,
                        'log' => false,
                    );
                } else {
                    $gmail = array(
                        'transport' => 'Mail',
                        'from' => $smtp_user,
                            //'charset' => 'utf-8',
                            //'headerCharset' => 'utf-8',
                    );
                }

                $email = new CakeEmail($gmail);
                $email->emailFormat('html');
                $email->to($smtp_test_user);
                $email->from($smtp_user);
                $email->subject('Test Message');
                try {
                    if ($email->send('This is a test message')) {
                        $result = array();
                        $result['result_code'] = '1';
                        echo json_encode($result);
                    } else {
                        $result = array();
                        $result['result_code'] = '-1';
                        echo json_encode($result);
                    }
                } catch (Exception $ex) {
                    $result = array();
                    $result['result_code'] = '-1';
                    echo json_encode($result);
                }
            }
        }
        exit();
    }

}
