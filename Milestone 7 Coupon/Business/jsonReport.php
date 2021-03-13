<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

require_once('../autoloader.php');



include('../Presentation/header.php');

$uh = new userHandler();
$ph = new productHandler();
$u = new utilityHandler();
$userID = $u->getUser();
$report = $uh->getSalesReportTable($userID);

$sales = array();
for($x=0; $x<count($report); ++$x){
    $product = $ph->displayProduct($report[$x][4]);
    $obj = new orderObject($report[$x][2], $product[1], $report[$x][3], $report[$x][5], $report[$x][0]);
    $sales[$x] = $obj;
}

$myJSON = json_encode($sales, JSON_PRETTY_PRINT);



?>

<!doctype html>
<html>

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="stylesheet" href="../CSS/styles.css?v=<?php echo time(); ?>" type="text/css">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        

        <title>CS236 Project</title>
    
    </head>
    <body>
    <?php 
        echo "<pre>";
        print_r($myJSON);
        echo "</pre>";
    ?>
    </body>

</html>