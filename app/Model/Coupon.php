<?php

class Coupon extends AppModel {
    public function getDiscount($couponcode) {
        
        $coupon = $this->findByCouponCode($couponcode);
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
}

?>