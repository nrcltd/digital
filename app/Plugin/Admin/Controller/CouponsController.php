<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('AppController', 'Controller');

class CouponsController extends AdminAppController {

    public $helpers = array('Html', 'Form');
    public $name = 'Coupons';
    public $uses = array('Admin.Coupon');

    public function index() {
        $this->setMenuItems();
        $this->loadModel('Product');
        $products = $this->Product->find('all');
        $this->set('products', $products);
        $coupons = $this->Coupon->find('all');
        $this->set('coupons', $coupons);
        $this->render('index');
    }

    public function add() {
        if ($this->request->isPost()) {
            $data = $this->request->data;
            $coupon_id = $this->Coupon->addCoupon($data);
            if ($coupon_id == false) {
//                exit();
                return;
            } else {
                $this->Redirect(array('controller' => 'coupons', 'action' => 'index'));
            }
        } else {
            $this->setMenuItems();
            $this->render('add');
        }
    }

    public function delete($id = null) {
        $this->Coupon->delete($id, false);
        $this->Redirect(array('controller' => 'coupons', 'action' => 'index'));
    }

}
