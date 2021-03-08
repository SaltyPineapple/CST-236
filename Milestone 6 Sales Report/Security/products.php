<!--

==========================
       
        Mark Pratt
        CST-236
        Version Num: 3

        Data layer for retrieving product info

==========================

-->

<?php

require_once('../autoloader.php');


class products{
    function getProduct($id){
        
        $util = new utility();
        
        $sql = "SELECT * FROM PRODUCTS WHERE ID = '$id'";

        $con = $util->dbConnect();

        $result = mysqli_query($con, $sql);

        $product = array();

        if(mysqli_num_rows($result) > 0){
            $row = $result->fetch_assoc();
            
            
            $product[0] = $row["ID"];
            $product[1] = $row["PRODUCT_NAME"];
            $product[2] = $row["PRODUCT_DESC"];
            $product[3] = $row["INVENTORY"];
            $product[4] = $row["PRICE"];

        }
        

        return $product;
        
    
    }

    function getAllProducts(){

        
        $util = new utility();
        
        $sql = "SELECT * FROM products";

        $con = $util->dbConnect();

        $result = mysqli_query($con, $sql);

        $product = array();

        $index = 0;

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_assoc($result)){

                $product[$index] = array(
                    $row["ID"], $row["PRODUCT_NAME"], $row["PRODUCT_DESC"], $row["INVENTORY"], $row["PRICE"]
                );

                ++$index;
            }
            
        }
        

        return $product;
    }

    function searchResults($value){

        
        $util = new utility();

        $sql = "SELECT * FROM PRODUCTS WHERE PRODUCT_NAME LIKE '%$value%'";

        $con = $util->dbConnect();

        $result = mysqli_query($con, $sql);

        $product = array();

        $index = 0;

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_assoc($result)){

                $product[$index] = array(
                    $row["ID"], $row["PRODUCT_NAME"], $row["PRODUCT_DESC"], $row["INVENTORY"], $row["PRICE"]
                );

                ++$index;
            }
            
        }
        

        return $product;


    }
}

?>