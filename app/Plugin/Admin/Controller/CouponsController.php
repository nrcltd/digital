<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('AppController', 'Controller');

class CouponsController extends AdminAppController {

    public $helpers = array('Html', 'Form');
    public $name = 'Coupons';
    public $uses = array('Admin.Coupon');

    public function index() {

        $productkey = $this->request->query('product');
        $keyword = $this->request->query('keyword');

        $productname = 'Product filter';
        $this->set('keyword', $keyword);
        $this->set('product', $productkey);
        $this->setMenuItems();
        $this->loadModel('Product');
        $products = $this->Product->find('all');
        if (!empty($productkey)) {
            $productstemp = $this->Product->findById($productkey);
            if (!empty($productstemp)) {
                $productname = $productstemp['Product']['product_name'];
            }
        }
        $this->set('productname', $productname);
        $this->set('products', $products);
        $coupons = $this->Coupon->searchCoupons($productkey, $keyword);
        $this->set('coupons', $coupons);
        $this->render('index');
    }

    public function add($id = null) {


        if ($this->request->isPost()) {
            $data = $this->request->data;
            $productprice = $data['productprice'];
            $this->set('product', $data['Coupon']['product_id']);
            $coupon_id = $this->Coupon->addCoupon($data, $productprice);
            if ($coupon_id == false) {
                $this->loadModel('Product');
                $product = $this->Product->findById($data['Coupon']['product_id']);
                $this->set('productprice', $product['Product']['product_price']);
                return;
            } else {
                $this->Redirect(array('controller' => 'coupons', 'action' => 'index'));
            }
        } else {
            if (empty($id)) {
                $this->Redirect(array('controller' => 'coupons', 'action' => 'index'));
                exit();
            } else {
                $this->loadModel('Product');
                $product = $this->Product->findById($id);
                $this->set('product', $id);
                $this->set('productprice', $product['Product']['product_price']);
                $this->setMenuItems();
                $this->render('add');
            }
        }
    }

    public function delete($id = null) {
        $this->Coupon->delete($id, false);
        $this->Redirect(array('controller' => 'coupons', 'action' => 'index'));
    }

}
