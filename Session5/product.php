<?php
namespace Store;
abstract class Product
{
    public $id;
    public $name;
    public $price;
    public $discount;

    function __construct($id, $name, $price, $discount)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->discount = $discount;
    }
    function getPrice()
    {
        return $this->price - $this->price * $this->discount;
    }

    function __destruct()
    {
        //echo 'Destructed';
    }

    abstract function saveToSession();
}

class StringHelper
{
    const PI = 3.14;

    static function fix($str)
    {
        return trim(htmlspecialchars($str));
    }
}