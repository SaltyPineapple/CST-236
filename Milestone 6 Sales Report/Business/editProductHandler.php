<!--

==========================
       
        Mark Pratt
        CST-236
        Version Num: 3

        Handler for ordering new products

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

$prodID = $_GET["ID"];

$sql = "UPDATE products set PRODUCT_NAME = '$prodName', PRODUCT_DESC = '$prodDesc', INVENTORY = '$prodInv', PRICE='$prodPrice' where ID='$prodID'";

$result = mysqli_query($con, $sql);

if($result){
    echo"Product Successfully Updated!";
    header('Location: ../Presentation/administrationPage.php');
}
else{
    echo"what". mysqli_error($con);
}




?>