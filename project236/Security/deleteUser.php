<!--

==========================
       
        Mark Pratt
        CST-236
        Version Num: 3

        SQL for deleting users

==========================

-->
<?php

require_once('../autoloader.php');
$u = new Utility();
$con = $u->dbConnect();

$ID = $_GET["ID"];

$sql = "DELETE FROM USERS WHERE ID = '$ID'";
$sqlRole = "DELETE FROM ROLES WHERE ID='$ID'";

$result = mysqli_query($con, $sql);
$resultRole = mysqli_query($con, $sqlRole);

if($result && $resultRole){
    echo "User Deleted";
    header("Location: ../Presentation/administrationPage.php");
}


?>