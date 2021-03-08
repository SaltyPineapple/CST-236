<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

require_once('../autoloader.php');
session_start();

include('header.php');

$uh = new userHandler();
$ph = new productHandler();
$u = new utilityHandler();
$userID = $u->getUser();
$report = $uh->getSalesReportTable($userID);

// echo"<pre>";
// print_r($report);
// echo"</pre>";

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
        <table>
            <tr>
                <th>Order Date</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Order Tracking Number</th>
            </tr>

            <!-- prints out the table of order history -->
            <?php
                for($x=0; $x<count($report); ++$x){
                    $product = $ph->displayProduct($report[$x][4]);
                    echo"<tr>";
                        echo"<td>".$report[$x][2]."</td>";
                        echo"<td>".$product[1]."</td>";
                        echo"<td>".$report[$x][3]."</td>";
                        echo"<td>$".$report[$x][5]."</td>";
                        echo"<td>".$report[$x][0]."</td>";
                    echo"</tr>";
                }
            
            
            ?>



        </table>
        <div class="button">
            <a href="../Business/jsonReport.php">Get JSON Data</a>
        </div>
        


    </body>



</html>