<!--

==========================
       
        Mark Pratt
        CST-236
        Version Num: 3

        Handler for adding new products

==========================

-->
<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

require_once('../autoloader.php');
$util = new Utility();

$con = $util->dbConnect();

$prodName = $_POST["prodName"];
$prodDesc = $_POST["prodDesc"];
$prodInv = $_POST["prodInv"];
$prodPrice = $_POST["prodPrice"];

$sql = "INSERT INTO products (PRODUCT_NAME, PRODUCT_DESC, INVENTORY, PRICE) values ('$prodName', '$prodDesc', '$prodInv', '$prodPrice')";

$result = mysqli_query($con, $sql);

if($result){
    echo"Product Successfully Ordered!";
    header('Location: ../Presentation/home.php?num=0');
}
else{
    echo"what". mysqli_error($con);
}






?>