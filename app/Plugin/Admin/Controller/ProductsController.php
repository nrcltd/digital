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
        if ($this->request->isPost()) {
            $data = $this->request->data;
            $product_id = $this->Product->updateProduct($data);
            if ($product_id == false) {
//                exit();
                return;
            } else {
                $products = $this->Product->findById($product_id);
//                debug($products);
                $this->set('products', $products);
                $this->setMenuItems();
                $this->Session->setFlash('Product is updated successfully!');
                $this->render('edit');
            }
        } else {
            $products = $this->Product->findById($id);
            $this->set('products', $products);
//        debug($products);
            $this->setMenuItems();
            $this->render('edit');
        }
    }

}
