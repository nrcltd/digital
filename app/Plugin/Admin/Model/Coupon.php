<?php

class Coupon extends AppModel {

    public $order = array('Coupon.coupon_created_date' => 'desc');

    private function generateCouponCode($no_of_codes, $exclude_codes_array = '', $code_length = 6) {
        $characters = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";

        $promotion_codes = array();
        for ($j = 0; $j < $no_of_codes; $j++) {
            $code = "";
            for ($i = 0; $i < $code_length; $i++) {
                $code .= $characters[mt_rand(0, strlen($characters) - 1)];
            }

            if (!in_array($code, $promotion_codes)) {
                if (is_array($exclude_codes_array)) {
                    if (!in_array($code, $exclude_codes_array)) {
                        $promotion_codes[$j] = $code;
                    } else {
                        $j--;
                    }
                } else {
                    $promotion_codes[$j] = $code;
                }
            } else {
                $j--;
            }
        }
        return $promotion_codes;
    }

    public $validate = array(
        'coupon_quantity' => array(
            'rule_1' => array(
                'rule' => 'notEmpty'
            ),
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please supply the number of coupons.'
            ),
            'range' => array(
                'rule' => array('range', 0, 1000000000),
                'message' => 'The number of coupons can not be 0.'
            )
        ),
        'coupon_amount' => array(
            'rule_2' => array(
                'rule' => 'notEmpty'
            ),
            'decimal' => array(
                'rule' => array('decimal'),
                'message' => 'Please supply the amount of coupons.'
            )
//            ,
//            'range' => array(
//                'rule' => array('range', 0, 1000000000),
//                'message' => 'The amount of coupons can not be 0.'
//            )
        )
    );

    public function addCoupon($data, $price) {
//        $data['Coupon']['product_id'] = $id;
        $availableCouponCode = array();
        $arrcouponcode = $this->find('all', array(
            'fields' => array('DISTINCT Coupon.coupon_code')
        ));

        for ($index = 0; $index < count($arrcouponcode); $index++) {
            $availableCouponCode[$index] = $arrcouponcode[$index]['Coupon']['coupon_code'];
        }
        $data['Coupon']['coupon_created_date'] = date("Y-m-d H:i:s");
        $couponcode = $this->generateCouponCode(1, $availableCouponCode, 6);
//        debug($data);
        $data['Coupon']['coupon_code'] = $couponcode[0];
        $this->set($data);

        // check coupon amount
        $this->validator()->add('coupon_amount', 'range', array(
            'rule' => array('range', 0, $price + 0.01),
            'message' => 'The amount of coupons can not be 0 or over '. $price. '$'
        ));

        if ($this->validates()) {


            $this->create();
            $this->save($data);
            $data['id'] = $this->id;
            return $data;
        } else {
//            debug($this->validates());
        }

        return false;
    }

    public function searchCoupons($productkey = '', $keyword = '') {
        if (!(empty($productkey)) && !(empty($keyword))) {
            $products = $this->find('all', array(
                'conditions' => array('UPPER(Coupon.coupon_code) like' => '%' . strtoupper($keyword) . '%',
                    'Coupon.product_id' => $productkey)
            ));
        } else if (!empty($productkey)) {

            $products = $this->find('all', array(
                'conditions' => array('Coupon.product_id' => $productkey)
            ));
        } else if (!empty($keyword)) {
            $products = $this->find('all', array(
                'conditions' => array('UPPER(Coupon.coupon_code) like' => '%' . strtoupper($keyword) . '%')
            ));
        } else {
            $products = $this->find('all');
        }

        return $products;
    }

}

?>