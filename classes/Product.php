<?php

namespace classes;

abstract class Product
{
    public $name;
    public $price;

    private $discount = 0;

    // public $public = 'PUBLIC';
    // protected $protected = 'PROTECTED';
    // private $private = 'PRIVATE';

    const TEST = 10;


    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price - ($this->discount / 100 * $this->price);
    }

    public function getDiscount()
    {
        return $this->discount;
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    public function getProduct()
    {
        $out = "
        <h3>Інформація про товар:</h3><br>
        Назва:{$this->getName()}<br>
        Ціна:{$this->getPrice()}<br>";

        return $out;
    }

    abstract protected function addProduct($name, $price);
}