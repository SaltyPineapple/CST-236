<?php

require_once('../autoloader.php');

class cart{
    private $userID;
    private $items = array();
    private $subtotal = array();
    private $totalPrice;

    

    function __construct($userID){
        $this->userID = $userID;
        $this->items = array();
        $this->subtotal = array();
        $this->totalPrice = 0;

    }


    function addItem($prodID){
        // assume cart is empty
        if(array_key_exists($prodID, $this->items)){
            $this->items[$prodID] += 1;
        }
        else{
            $this->items = $this->items + array($prodID => 1);
        }
        

    }
    
    function updateQty($prodID, $qty){
        // assume cart is empty
        if(array_key_exists($prodID, $this->items)){
            $this->items[$prodID] = $qty;
        }
        else{
            $this->items = $this->items + array($prodID => $qty);
        }

        if($this->items[$prodID] == 0){
            unset($this->items[$prodID]);
        }
    }

    function calcTotal(){
        // calc subtotal for each item
        // create an array of subtotals
        $subtotalsArray = array();
        
        $ph = new productHandler();

        $this->totalPrice = 0;
        foreach($this->items as $item => $qty){
            $product = $ph->displayProduct($item);
            $productSubtotal = $product[4] * $qty;
            $subtotalsArray = $subtotalsArray + array($item => $productSubtotal);
            $this->totalPrice = $this->totalPrice + $productSubtotal;
        }

        $this->subtotal = $subtotalsArray;


         

    }

    function reset(){
        $this->items = array();
        $this->subtotal = array();
        $this->totalPrice = 0;
    }




    public function getUserID(){
        return $this->userID;
    }
    public function getItems(){
        return $this->items;
    }
    public function getSubtotal(){
        return $this->subtotal;
    }
    public function getTotalPrice(){
        return $this->totalPrice;
    }

    public function setUserID($id){
        $this->userID = $id;
    }
    public function setItems($items){
        $this->items = $items;
    }
    public function setSubtotal($subtotal){
        $this->subtotal = $subtotal;
    }
    public function setTotalPrice($totalPrice){
        $this->totalPrice = $totalPrice;
    }
}


?>