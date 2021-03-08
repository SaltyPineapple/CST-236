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



$_SESSION["USERCART"] = $c;
header("Location: ../Presentation/viewCart.php");



?>