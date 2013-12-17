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

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class ProductsController extends AppController {

    public $helpers = array('Html', 'Form');
    
    public function index() {
        throw new NotFoundException(__('Invalid Product'));
    }
    
    public function buy($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid Product'));
        }
        
        $product = $this->Product->findById($id);
        if (!$product) {
            throw new NotFoundException(__('Invalid Product'));
        }
//        debug($product['Product']['product_name']);
        // load theme
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
//        debug($option);
        $this->set('product', $product);
        $this->set('title_for_layout', $product['Product']['product_name']);
        $this->render($optionCode);
    }

}