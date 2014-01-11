<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('AppController', 'Controller');

class ProductsController extends AdminAppController {

    public $helpers = array('Html', 'Form');
    public $name = 'Products';
    public $uses = array('Admin.Product');

    public function index() {
        $keyword = $this->request->query('keyword');
//        debug(empty($keyword));
        $this->set('keyword', $keyword);
        $products = $this->Product->searchProducts($keyword);
//        debug($products);
        $this->set('products', $products);
        $this->setMenuItems();
        $this->render('index');
    }

    public function add() {
        $this->setMenuItems();

        if ($this->request->isPost()) {
            $data = $this->request->data;
            $result = $this->Product->addProduct($data);
            if ($result == false) {
                $this->render('add');
//                exit();
                return;
            } else {
                $this->Redirect(array('controller' => 'products', 'action' => 'index'));
//                exit();
            }
        }
        $this->render('add');
    }

    public function edit($id = null) {
//                    debug($this->request->isPost());
        if ($this->request->isPost()) {
//            debug($this->request);
            $data = $this->request->data;
//            debug($data);
            $product_id = $this->Product->updateProduct($data);
            if ($product_id == false) {
//                exit();
                return;
            } else {
//                $products = $this->Product->findById($product_id);
////                debug($products);
//                $this->set('products', $products);
//                $this->setMenuItems();
//                $this->Session->setFlash('Product is updated successfully!');
//                $this->render('edit');

                $this->Redirect(array('controller' => 'products', 'action' => 'index'));
            }
        } else {
            $products = $this->Product->findById($id);
            $this->set('products', $products);

            if ($products['Product']['product_paused'] == 0) {
                $this->set('activelabel', 'Pause');
                $this->set('activelabelvalue', '1');
            } else {
                $this->set('activelabel', 'Active');
                $this->set('activelabelvalue', '0');
            }

//        debug($products);
            $this->setMenuItems();
            $this->render('edit');
        }
    }

    public function pauseproduct() {
        if ($this->request->isPost()) {
            $productid = $this->request->data('productid');
            $paused = $this->request->data('paused');
            $this->Product->pauseproduct($productid, $paused);
            $result = array();
            if ($paused == 0) {
                $result['result_code'] = '1';
            } else {
                $result['result_code'] = '0';
            }
            echo json_encode($result);
        }
        exit();
    }

    public function updateavatar() {
        if ($this->Session->check('User')) {
            if ($this->request->isPost()) {
                $imageid = $this->request->data('imageid');
                $this->Product->id = $this->request->data('productid');
                $this->Product->set('product_image_id', $imageid);
                $this->Product->save();
            }
        }
        exit();
    }

}
