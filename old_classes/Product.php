<?php

class Product
{
    public $name;
    public $price;

    private $discount = 0;

    public $public = 'PUBLIC';
    protected $protected = 'PROTECTED';
    private $private = 'PRIVATE';


    public function __construct($name, $price)
    {
        // echo __METHOD__ . '<br>';
        $this->name = $name;
        $this->price = $price;

        // var_dump($this->private);
        // var_dump($this->protected);
        // var_dump($this->private);


    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        // return $this->price;

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
        // echo __METHOD__ . '<br>';
        $out = "
        <h3>Інформація про товар:</h3><br>
        Назва:{$this->getName()}<br>
        Ціна:{$this->getPrice()}<br>";

        return $out;
    }








}