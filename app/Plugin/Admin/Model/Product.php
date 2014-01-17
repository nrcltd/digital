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
            ),
            'decimal' => array(
                'rule' => array('decimal'),
                'message' => 'Please supply the price of product.'
            ),
            'range' => array(
                'rule' => array('range', 0, 1000000000),
                'message' => 'The price of product can not be 0.'
            )
        ),
        'product_description' => array(
            'rule_3' => array(
                'rule' => 'notEmpty'
            )
        ),
        'product_image_id' => array(
            'rule_4' => array(
                'rule' => 'notEmpty'
            )
        ),
        'product_file_id' => array(
            'rule_5' => array(
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
        } else {
            
        }
        return false;
    }

    public function pauseproduct($productid, $paused) {
        $this->id = $productid;
        $this->set('product_paused', $paused);
        $this->save();
        return $this->id;
    }

    public function searchProducts($keyword = '') {
        if (empty($keyword)) {
            $products = $this->find('all');
        } else {

            $products = $this->find('all', array(
                'conditions' => array('UPPER(Product.product_name) like' => '%' . strtoupper($keyword) . '%') //array of conditions
            ));
        }

        return $products;
    }

}

?>