<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');
App::uses('Validation', 'Utility');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class OrdersController extends AppController {

    public $helpers = array('Html','Form','PaypalIpn.Paypal');

    public function index() {
        $this->layout = 'error404';
        $this->render('index');
    }

    public function add() {
//        $this->Order->set($this->request->data);
//        debug($this->Order);
        $data = $this->request->data;
//        debug($data);
        $result = $this->Order->addOrder($data);
        if ($result == false) {
            $this->index();
            return;
        } else {
            return $this->redirect(
                            array(
                                'action' => 'invoice',
                                '?' => array(
                                    'id' => $result['id'],
                                    'token' => $result['token'])
            ));
        }
//        debug($this->Order->invalidFields());
//        $this->Order->save();
//        debug($this->Order->validates());
//        if ($this->Order->validates()) {
//            // it validated logic
//            debug($this->Order->invalidFields());
//            exit;
//        } else {
//            // didn't validate logic
////            debug($this->Order->validates());
//            $errors = $this->Order->validationErrors;
//            debug($this->request->data['Order']['customer_email']);
//        }
    }

    public function invoice() {

        $this->loadModel('Option');
        $option = $this->Option->findByOptionName('frontend_theme');
        $optionCode = 'spring';
        if ($option) {
            $optionValue = $option['Option']['option_value'];
            $this->loadModel('Theme');
            $theme = $this->Theme->findById($optionValue);
            if ($theme) {
                $optionCode = $theme['Theme']['theme_code'];
            }
        }
//        debug($this->request);
        $orderid = $this->request->query['id'];
        $tokencode = $this->request->query['token'];
        if (empty($orderid)) {
            $this->index();
            return;
        }
        if (empty($tokencode)) {
            $this->index();
            return;
        }

        $order = $this->Order->findOrder($orderid,$tokencode);
//        debug($order);
        $this->set('theme', $optionCode);
        if ($order == false) {
            $this->index();
            return;
        }
        $product_id = $order['Order']['product_id'];
//        debug($product_id);
        
        $this->loadModel('Product');
        $product = $this->Product->findById($product_id);
        $this->set('product', $product);
        
        $this->loadModel('Option');
        $option = $this->Option->findByOptionName('currency_code');
        $currencyCode = '$';
        if ($option) {
           $currencyCode = $option['Option']['option_value']; 
        }
        $this->set('currencyccode', $currencyCode);
        $this->set('order', $order);
        $this->set('title_for_layout', 'Invoice #'.$order['Order']['id']);
    }

}
