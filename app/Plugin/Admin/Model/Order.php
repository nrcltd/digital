<?php

class Order extends AppModel {

    public $order = array('Order.purchased_date' => 'DESC', 'Order.customer_name' => 'asc');

    public function searchOrders($productkey = '', $email = '') {
        if (!(empty($productkey)) && !(empty($email))) {
            $orders = $this->find('all', array(
                'conditions' => array('UPPER(Order.customer_email) like' => '%' . strtoupper($email) . '%',
                    'Order.product_id' => $productkey,
                    'Order.orderstatus like' => '%paid%')
            ));
        } else if (!empty($productkey)) {

            $orders = $this->find('all', array(
                'conditions' => array('Order.product_id' => $productkey, 'Order.orderstatus like' => '%paid%')
            ));
        } else if (!empty($email)) {
            $orders = $this->find('all', array(
                'conditions' => array('UPPER(Order.customer_email) like' => '%' . strtoupper($email) . '%',
                    'Order.orderstatus like' => '%paid%')
            ));
        } else {
            $orders = $this->find('all', array(
                'conditions' => array('Order.orderstatus like' => '%paid%')
            ));
        }

        return $orders;
    }

    public function getExportedOrder($productkey = '', $email = '') {
        if (!(empty($productkey)) && !(empty($email))) {
            $orders = $this->find('all', array(
                'fields' => array('Order.customer_name', 'Order.customer_email', 'Order.purchased_date', 'Order.coupon_code'),
                'conditions' => array('UPPER(Order.customer_email) like' => '%' . strtoupper($email) . '%',
                    'Order.product_id' => $productkey,
                    'Order.orderstatus like' => '%paid%')
            ));
        } else if (!empty($productkey)) {

            $orders = $this->find('all', array(
                'fields' => array('Order.customer_name', 'Order.customer_email', 'Order.purchased_date', 'Order.coupon_code'),
                'conditions' => array('Order.product_id' => $productkey,
                    'Order.orderstatus like' => '%paid%')
            ));
        } else if (!empty($email)) {
            $orders = $this->find('all', array(
                'fields' => array('Order.customer_name', 'Order.customer_email', 'Order.purchased_date', 'Order.coupon_code'),
                'conditions' => array('UPPER(Order.customer_email) like' => '%' . strtoupper($email) . '%',
                    'Order.orderstatus like' => '%paid%')
            ));
        } else {
            $orders = $this->find('all', array(
                'conditions' => array('Order.orderstatus like' => '%paid%'),
                'fields' => array('Order.customer_name', 'Order.customer_email', 'Order.purchased_date', 'Order.coupon_code')
            ));
        }

        return $orders;
    }

}

?>