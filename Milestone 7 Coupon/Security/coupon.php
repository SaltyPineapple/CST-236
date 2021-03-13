<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

require_once('../autoloader.php');

class coupon{
    function getCouponPercentage($code){
        $u = new utility();
        $con = $u->dbConnect();

        $sql = "SELECT * FROM COUPON_CODES where COUPON_CODE = '$code'";

        $result = mysqli_query($con, $sql);
        
        $percentage = 0;

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $percentage = $row["COUPON_AMT"];
        }

        return $percentage;
    }

    function getRandomCoupon(){
        $u = new utility();
        $con = $u->dbConnect();

        $num = rand(1,5);
        $sql = "SELECT * FROM COUPON_CODES where COUPON_ID = $num";

        $result = mysqli_query($con, $sql);

        $code = "";

        if(mysqli_num_rows($result) > 0){
           $row = mysqli_fetch_assoc($result);
           $code = $row["COUPON_CODE"];
            
        }


        return $code;

    }
}


?>