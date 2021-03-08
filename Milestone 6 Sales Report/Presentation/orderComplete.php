<!--

==========================
       
        Mark Pratt
        CST-236
        Version Num: 5

        Page shows when order is complete

==========================

-->
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

                // error_reporting(E_ALL);
                // ini_set('display_errors', 1);

                include('header.php');

                $orderNum = $_GET["orderNum"];

                echo"order success!<br>";
                echo "Order Number: ".$orderNum;
                echo"<br> <a href='home.php?num=0'>Continue Shopping</a>";
                
        ?>

        </body>

</html>

