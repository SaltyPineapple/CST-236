<!--

==========================
       
        Mark Pratt
        CST-236
        Version Num: 5

        Order Handler
        Handler for order transactions
        Validates credit card info and starts atomic transaction

==========================

-->

<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

    require_once('../autoloader.php');
    session_start();

    $u = new utility();
    $con = $u->dbConnect();
    $obs = new orderBusinessService($con);
    $uh = new userHandler();
    $user = $uh->getSingularUser($_SESSION["userid"]);

    $creditCard = $_POST["creditCard"];
    $pin = $_POST["ccPin"];

    // if credit card information is null, save card info into user
    // otherwise validate card
    // if card is valid, 

    

    if($creditCard == ""){
        echo"<script>if (confirm('Please Enter Credit Card'))
                 location.href='../Presentation/viewCart.php';
                 else
                    location.href='../Presentation/viewCart.php';
        </script>";
    }
    else if($pin ==""){
        echo"<script>if (confirm('Please Enter Credit Card Pin'))
                 location.href='../Presentation/viewCart.php';
                 else
                    location.href='../Presentation/viewCart.php';
        </script>";
    }
    else{
        // cc
        if($user[10] == null){
            echo"Adding credit card to user";
            $uh->addCreditCard($creditCard, $pin, $user[0]);
            $obs->doOrder();
        }
        else{
            if($user[10] == $creditCard && $user[11] == $pin){
                $obs->doOrder();
            }
            else{
                echo"<script>if (confirm('Unable to complete order'))
                 location.href='../Presentation/viewCart.php';
                            else
                            location.href='../Presentation/viewCart.php';
                </script>";
            }
        }
    }



?>