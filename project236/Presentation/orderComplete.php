<!--

==========================
       
        Mark Pratt
        CST-236
        Version Num: 5

        Page shows when order is complete

==========================

-->

<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

include('header.php');

$orderNum = $_GET["orderNum"];

echo"order success!<br>";
echo "Order Number: ".$orderNum;
echo"<br> <a href='home.php?num=0'>Continue Shopping</a>";




?>