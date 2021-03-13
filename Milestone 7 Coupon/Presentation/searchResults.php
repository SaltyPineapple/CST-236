<!--

==========================
       
        Mark Pratt
        CST-236
        Version Num: 3

        Displays search results on to page

==========================

-->

<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

include('header.php');

require_once('../autoloader.php');

$page = $_GET["num"];
$value = $_GET["value"];

$ph = new productHandler();
$products = $ph->searchResults($value);

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

        <div class="tabs">
            <?php $currentPage = $page ?>
            <a href="searchResults.php?num=<?php 
            if($currentPage - 9 <= 0){ 
                echo 0; 
            } 
            else {
                echo $currentPage - 9;
                } ?>&value=<?php echo $value; ?>" class="tabulate"><i class="fas fa-arrow-left"></i> Previous</a>
            <a href="searchResults.php?num=<?php 
            if($currentPage + 9 >= count($products)){ 
                echo count($products); 
            } 
            else {
                echo $currentPage + 9;
                } ?>&value=<?php echo $value; ?>" class="tabulate">Next <i class="fas fa-arrow-right"></i></a>

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

    
    </body>
    
</html>