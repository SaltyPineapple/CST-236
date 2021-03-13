<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('../autoloader.php');

session_start();

$id = $_GET["prodNum"];

if(isset($_SESSION["USERCART"])){
    echo"cart";
    $c = $_SESSION["USERCART"];
}
else{
    if(isset($_SESSION["userid"])){
        echo"newCart";
        $c = new cart($_SESSION["$_USERID"]);
    }
    else{
        echo "please log in first";
        exit;
    }
    
}

$c->addItem($id);
$c->calcTotal();

$coup = new couponHandler();
$code = $coup->getRandomCoupon();
$perc = $coup->getCouponPercentage($code);

$_SESSION["USERCART"] = $c;

$num = rand(1,10);

if($num < 4){
    echo"<script>if (confirm('You qualify for a coupon code! Code: $code : $perc% off!'))
                 location.href='../Presentation/viewCart.php';
                 else
                    location.href='../Presentation/viewCart.php';
        </script>";
}
else{
    header("Location: ../Presentation/viewCart.php");
}







?>