<?php

class Order extends AppModel {
    public $order = array('Order.purchased_date' => 'DESC', 'Order.customer_name' => 'asc');
}

?>