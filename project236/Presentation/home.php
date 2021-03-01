<!--

==========================
       
        Mark Pratt
        CST-236
        Version Num: 3

        Home Page for the Site
        Shows all products, tabulated

==========================

-->

<?php
session_start();

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

include('header.php');



require_once('../autoloader.php');

$page = $_GET["num"];

$ph = new productHandler();
$products = $ph->getAllProducts();

$uh = new userHandler();
$utility = new utilityHandler();

?>


<!Doctype HTML>
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

        <div>
            <a href="viewCart.php">View Cart</a>
        </div>

        <div style="text-align: right;">
            <a href="index.php">Log Out</a>
        </div>

        <div>
            <?php
                $username = $utility->getUser();
                $adminStatus = $uh->getAdminStatus($username); //be a string, rolename
                if($adminStatus == "admin"){
                    echo"<a href='administrationPage.php'>Admin Home</a>";
                }
            
            ?>
        
        </div>
        

        <div>
            <?php $currentPage = $page ?>
            <a href="home.php?num=<?php 
            if($currentPage - 9 <= 0){ 
                echo 0; 
            } 
            else {
                echo $currentPage - 9;
                } ?>">Previous</a>
            <a href="home.php?num=<?php 
            if($currentPage + 9 >= count($products)){ 
                echo count($products)-1; 
            } 
            else {
                echo $currentPage + 9;
                } ?>">Next</a>

        </div>

        <div class="SearchForm">
            <form method="get" action="../Business/searchHandler.php">
                <label for="search">Search: </label>
                <input type="text" name="search">
                <input type="submit" value="Search">
            </form>

        </div>

        <div id="productArea">

            <?php
            

                for($x = $page; $x<($page + 9); $x++){
                    
                    if($x < count($products)){
                        echo"<div class='card'>";
                        echo"<img src='../Images/blankProduct.png'>";
                        echo"<h1>".$products[$x][1]."</h1>";
                        echo"<h3>".$products[$x][2]."</h3>";
                        echo"<h3>$".$products[$x][4]."</h3>";
                        echo"<a href='../Business/addToCartHandler.php?prodNum=".$products[$x][0]."'>Add to Cart</a>";
                        echo"</div>";
                    }
                    
                }

            ?>
        </div>

        <a href="../Business/addToCartHandler.php?prodNum=1">hand</a>

    
    </body>
    
</html>