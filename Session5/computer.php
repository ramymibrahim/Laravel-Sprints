<?php
require_once('./product.php');
class Computer extends Store\Product
{
    public $processorSpeed;
    function __construct($id, $name, $price, $discount, $processorSpeed)
    {
        parent::__construct($id, $name, $price, $discount);
        $this->processorSpeed = $processorSpeed;
    }

    function getSpeed()
    {
        return $this->processorSpeed;
    }
    function saveToSession(){

    }
}