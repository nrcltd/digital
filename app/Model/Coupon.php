<?php

class Coupon extends AppModel {

    public function getDiscount($couponcode, $product_id) {

//        $coupon = $this->findByCouponCode($couponcode);

        $coupon = $this->find('first', array(
            'conditions' => array('UPPER(Coupon.coupon_code)' => strtoupper($couponcode),
                'Coupon.product_id' => $product_id)
        ));

        if (!empty($coupon)) {
            $coupon_quantity = $coupon['Coupon']['coupon_quantity'];
            $coupon_amount = $coupon['Coupon']['coupon_amount'];
            $coupon_used = $coupon['Coupon']['coupon_used'];
            if ($coupon_used >= $coupon_quantity) {
                return 0;
            } else {
                return $coupon_amount;
            }
        }
        return 0;
    }

    public function updatequantitycoupon($couponcode, $product_id) {

        $coupon = $this->find('first', array(
            'conditions' => array('UPPER(Coupon.coupon_code)' => strtoupper($couponcode),
                'Coupon.product_id' => $product_id)
        ));

        $this->updateAll(
                array('Coupon.coupon_used' => $coupon['Coupon']['coupon_used'] + 1), array('UPPER(Coupon.coupon_code)' => strtoupper($couponcode),
                'Coupon.product_id' => $product_id)
        );
    }

}

?>