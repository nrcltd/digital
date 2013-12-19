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

    public $helpers = array('Html', 'Form');

    public function index() {
        
    }

    public function add() {
//        $this->Order->set($this->request->data);

//        debug($this->Order);
        $data = $this->request->data;
        $data['Order']['orderstatus'] = 'Pending';
        $data['Order']['purchased_date'] = date("Y-m-d H:i:s");
//        debug($data);
        $this->Order->set($data);
//        debug($this->Order->invalidFields());
        $this->Order->save();

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

}
