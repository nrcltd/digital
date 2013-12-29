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
//                debug($productstemp);

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
            $this->set('product', $data['Coupon']['product_id']);
            $coupon_id = $this->Coupon->addCoupon($data);
            if ($coupon_id == false) {
//                exit();
                return;
            } else {
                $this->Redirect(array('controller' => 'coupons', 'action' => 'index'));
            }
        } else {
            $this->set('product', $id);
            $this->setMenuItems();
            $this->render('add');
        }
    }

    public function delete($id = null) {
        $this->Coupon->delete($id, false);
        $this->Redirect(array('controller' => 'coupons', 'action' => 'index'));
    }

}
