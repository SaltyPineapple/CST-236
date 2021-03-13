<!--

==========================
       
        Mark Pratt
        CST-236
        Version Num: 3

        Handles and redirects all product requests

==========================

-->
<?php

require_once('../autoloader.php');


class productHandler{
    
    public function displayProduct($id){
        $product = new products();
        $p = $product->getProduct($id);
        return $p;
    }

    public function getAllProducts(){
        $product = new products();
        $p = $product->getAllProducts();
        return $p;
    }

    public function searchResults($value){
        $product = new products();
        $p = $product->searchResults($value);
        return $p;
    }

}


?>