<?php
require_once('./product.php');
require_once('./istorable.php');

trait HasColors{
    function getColor(){
        return $this->color;
    }

    function setColor($color){
        $this->color = $color;
    }
}
class Cloth extends Store\Product implements IStorable
{
    use HasColors;
    public $size;
    public $color;
    function __construct($id, $name, $price, $discount, $size)
    {
        parent::__construct($id, $name, $price, $discount);
        $this->size = $size;
    }

    function getSize()
    {
        return $this->size;
    }

    function getQuery(){

    }
    function storeToDB(){
        
    }
    function saveToSession(){
        
    }
}