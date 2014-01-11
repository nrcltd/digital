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
        $this->layout = 'error404';
        $this->render('index');
    }

    public function view($id = null) {
        if (!$id) {
            $this->index();
            return;
        }

        $product = $this->Product->findById($id);
        if (!$product) {
            $this->index();
            return;
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

        $option = $this->Option->findByOptionName('currency_code');
        $currencyCode = '$';
        if ($option) {
            $currencyCode = $option['Option']['option_value'];
        }

        $option = $this->Option->findByOptionName('seller_name');
        $sellerName = '';
        if ($option) {
            $sellerName = $option['Option']['option_value'];
        }

        $option = $this->Option->findByOptionName('seller_description');
        $sellerDescription = '';
        if ($option) {
            $sellerDescription = $option['Option']['option_value'];
        }

        $option = $this->Option->findByOptionName('seller_photo');
        $seller_photo = '';
        if ($option) {
            $seller_photo = $option['Option']['option_value'];
        }

        $this->loadModel('Image');
        $this->set("image_user_url", '');
        if (!empty($seller_photo)) {

            $imageinfo = $this->Image->findById($seller_photo);
            $imagepart = $imageinfo['Image'];
            $image_user_url = $imagepart['image_year'] . '/' . $imagepart['image_month'] . '/' . $imagepart['image_day'] . '/' . 'resize_' . $imagepart['image_name'] . $imagepart['image_ext'];
            $this->set("image_user_url", $image_user_url);
//            debug($image_user_url);
        }
//        debug($product);
        $product_image_id = $product['Product']['product_image_id'];
        if (!empty($product_image_id)) {
            $imageinfo = $this->Image->findById($product_image_id);
            $imagepart = $imageinfo['Image'];
            $image_user_url = $imagepart['image_year'] . '/' . $imagepart['image_month'] . '/' . $imagepart['image_day'] . '/' . 'resize_' . $imagepart['image_name'] . $imagepart['image_ext'];
            $this->set("image_product_url", $image_user_url);
        }

        $this->loadModel('ProductFile');
        $productfile = $this->ProductFile->findById($product['Product']['product_file_id']);

        $this->set('productfile', $productfile);
        $this->set('product', $product);
        $this->set('currencyccode', $currencyCode);
        $this->set('sellername', $sellerName);
        $this->set('sellerdescription', $sellerDescription);
        $this->set('title_for_layout', $product['Product']['product_name']);
        $this->render($optionCode);
    }

}
