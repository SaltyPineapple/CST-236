<?php

require_once('../autoloader.php');

class orderObject implements JsonSerializable{
    private $orderDate;
    private $productName;
    private $qty;
    private $price;
    private $orderNum;

    // object constructor
    function __construct($orderDate, $productName, $qty, $price, $orderNum){
        $this->orderDate = $orderDate;
        $this->productName = $productName;
        $this->qty = $qty;
        $this->price = $price;
        $this->orderNum = $orderNum;
    }

    // json serialize
    // for generating data in json format
    function jsonSerialize(){
        return get_object_vars($this);
    }


}

?>