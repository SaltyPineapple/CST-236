<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

require_once('../autoloader.php');

class couponHandler {

    function getCouponPercentage($code){
        $cu = new coupon();
        $percent = $cu->getCouponPercentage($code);
        return $percent;
    }

    function getRandomCoupon(){
        $cu = new coupon();
        $code = $cu->getRandomCoupon();
        return $code;
    }

}


?>