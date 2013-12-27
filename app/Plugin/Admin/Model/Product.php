<?php

class Product extends AppModel {
    public $hasMany = array(
        'Order' => array(
            'className' => 'Order'
        )
    );
}

?>