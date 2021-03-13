<?php

    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);

    include('header.php');
    require_once('../autoloader.php');


    $uh = new userHandler();
    $ph = new productHandler();
    
    session_start();

    if(isset($_SESSION["USERCART"])){
        $c = $_SESSION["USERCART"];
    }
    else{
        echo "No cart yet";
        exit;
    }

    if(isset($_SESSION["userid"])){
        $userID = $_SESSION["userid"];
    }
    else{
        echo"Log in first please";
        exit;
    }

    // echo"userID: ".$userID;

    $user = $uh->getSingularUser($userID);
    $total = $c->getTotalPrice();




?>
<!DOCTYPE html>
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

        <!-- <div>
            <a href="home.php?num=0">Home</a>
        </div> -->

        <h2>Cart</h2>
        

        <table>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
            <?php
                foreach($c->getItems() as $prodID => $qty){
                    $product = $ph->displayProduct($prodID);
    
                    echo"<tr>";
                            echo"<td>".$product[1]."</td>";
                            echo"<td>".$qty."</td>";
                            echo"<td>$".$product[4]."</td>";
                            echo"<td>$".$qty*$product[4]."</td>";

                    echo"</tr>";
    
                }

            ?> 


        </table>

        <h3>Total: <strong>$<?php echo $total; ?></strong></h3>
        
        <form action="../Business/orderHandler.php" method="post">
            <fieldset>
                <legend>Billing Information</legend>
                <label for="creditCard">Credit Card Number: </label>
                <input type="text" name="creditCard" value="<?php if($user[10] != null){echo $user[10];} ?>">
                <br>

                <label for="ccPin">Credit Card Pin: </label>
                <input type="text" name="ccPin" value="<?php if($user[11] != null){echo $user[11];} ?>">
                
                <br>
                <label for="coupon">Coupon code?</label>
                <input type="text" name="coupon">

            
            </fieldset>
            <br>
            <fieldset>
                <legend>Shipping Address</legend>
                <label for="address">Address: </label>
                <input type="text" name="address" value="<?php echo $user[6]; ?>">
                <br>

                <label for="city">City: </label>
                <input type="text" name="city" value="<?php echo $user[7]; ?>">
                <br>

                <label for="state">State: </label>
                <input type="text" name="state" value="<?php echo $user[8]; ?>">
                <br>

                <label for="zip">Zip: </label>
                <input type="text" name="zip" value="<?php echo $user[9]; ?>">
                
            </fieldset>
            <br>

            <input type="submit" value="Checkout">

        </form>

    
    
    
    </body>

</html>