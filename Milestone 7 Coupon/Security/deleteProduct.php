<!--

==========================
       
        Mark Pratt
        CST-236
        Version Num: 3

        SQL for deleting products

==========================

-->
<?php

require_once('../autoloader.php');
$u = new Utility();
$con = $u->dbConnect();

$ID = $_GET["ID"];

$sql = "DELETE FROM PRODUCTS WHERE ID = '$ID'";


$result = mysqli_query($con, $sql);

if($result){
    echo "Product Deleted";
    header("Location: ../Presentation/administrationPage.php");
}


?>