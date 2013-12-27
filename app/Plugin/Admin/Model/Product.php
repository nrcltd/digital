<?php

class Product extends AppModel {

    public $order = array('Product.product_name' => 'asc');
    public $hasMany = array(
        'Order' => array(
            'className' => 'Order'
        )
    );
    public $validate = array(
        'product_name' => array(
            'rule_1' => array(
                'rule' => 'notEmpty'
            )
        )
        ,
        'product_price' => array(
            'rule_2' => array(
                'rule' => 'notEmpty'
            )
        ),
        'product_description' => array(
            'rule_3' => array(
                'rule' => 'notEmpty'
            )
        )
    );

    public function addProduct($data) {
        $data['Product']['product_paused'] = 0;
//        $data['Order']['purchased_date'] = date("Y-m-d H:i:s");
        $this->set($data);
        if ($this->validates()) {

            $this->create();
            $this->save($data);
            $data['id'] = $this->id;
            return $data;
        }
        return false;
    }

    public function updateProduct($data) {
        $this->set($data);
        if ($this->validates()) {

            $this->id = $data['Product']['id'];
            $this->save($data, false);
            return $this->id;
        }
        return false;
    }

}

?>