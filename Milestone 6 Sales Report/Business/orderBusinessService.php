<!--

==========================
       
        Mark Pratt
        CST-236
        Version Num: 5

        Order Business Service
        Ensures ATOMIC transaction for ordering products

==========================

-->


<?php

require_once('../autoloader.php');


// error_reporting(E_ALL);
// ini_set('display_errors', 1);

class orderBusinessService{
    
    private $con;

    function __construct($con){
        $this->con = $con;
    }
    
    function doOrder(){

        session_start();
        $cart = $_SESSION["USERCART"];
        //$con2 = $db->dbConnect();

        
        $this->con->begin_transaction();
        $this->con->autocommit(false);

        $orderNumber = $this->createOrder($this->con, $cart);
        $orderDetails = $this->createOrderDetails($this->con, $cart, $orderNumber);

        if($orderNumber > 0 && $orderDetails){
            echo "<br> committed <br>";
            
            $this->con->commit();
            $_SESSION["USERCART"]->reset();
            header("Location: ../Presentation/orderComplete.php?orderNum=".$orderNumber);
        }
        else {
            echo "<br> Failed. Rolling back <br>";
            $this->con->rollback();
            header("Location: ../Presentation/orderFailed.php");
        }
        
        $this->con->close();
        


    }


    // add details of order to order table
    // cross reference with order ID to order details table (FK)
    // cross reference with user ID to users table (FK)
    function createOrder($con, $cart){
        session_start();
        $userID = $_SESSION["userid"];
        
        $sqlinsert = "INSERT INTO ORDERS (ORDER_DATE, USER_ID) values (CAST(CURRENT_TIMESTAMP AS DATE), $userID)";
        $sqlselect = "SELECT @@IDENTITY as 'Identity'";
        $resultinsert = mysqli_query($con, $sqlinsert);
        $resultselect = $con->query($sqlselect);


        if($resultinsert && $resultselect->num_rows != 0){
            $row = $resultselect->fetch_assoc();
            echo $row["Identity"]."<br>";
            //$con->close();
            return $row["Identity"];
        }
        else{
            
            echo "0";
            //$con->close();
            return 0;
        }
        
        

        
    }

    // Add details of order to the order_details table
    // make sure the product has enough in stock to order
    // update products inventory
    function createOrderDetails($con, $cart, $orderNum){
        $ph = new productHandler();
        echo"creating details";

        $success = false;
        foreach($cart->getItems() as $value=>$qty){
            $product = $ph->displayProduct($value);
            $price = $product[4];
            $sql = "INSERT INTO ORDER_DETAILS (QUANTITY, ORDER_ID, PRODUCT_ID, ORDER_PRICE) values ($qty, $orderNum, $value, $qty*$price)";
            $sqlselect = "SELECT * FROM PRODUCTS WHERE ID=$value";
            $resultSelect = $con->query($sqlselect);
            if($resultSelect){
                $row = $resultSelect->fetch_assoc();
                if($row["INVENTORY"] - $qty >= 0){
                    $result = $con->query($sql);
                    if($result){

                        $newQty = $row["INVENTORY"] - $qty;
                        
                        $sqlupdate = "UPDATE PRODUCTS SET INVENTORY = $newQty where ID=$value";
                        $resultUpdate = $con->query($sqlupdate);
                        if($resultUpdate){
                            $success = true;
                        }

                        echo"<br> Success: ".$sql;
                    }
                    else{
                        $success = false;
                        echo"<br> Failed: ".$sql;
                        break;
                    }
                }
                else {
                    echo"No inventory of product";
                }
            }

            
        }


        
       // $con->close();
        return $success;
    }
}


?>