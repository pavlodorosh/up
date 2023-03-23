<?php

class BookProduct extends Product
{
    public $numPage;


    public function __construct($name, $price, $numPage)
    {
        // echo __METHOD__ . '<br>';
        // $this->name = $name;
        // $this->price = $price;
        parent::__construct($name, $price);
        $this->numPage = $numPage;
        // var_dump($this->protected);
        // var_dump($this->public);
        $this->setDiscount(10);

    }

    public function getProduct()
    {
        // echo __METHOD__ . '<br>';
        $out = parent::getProduct();
        $out .= "Кількість сторінок:{$this->getNumPage()}<br>";
        $out .= "Розмір знижки:{$this->getDiscount()}<br>";

        return $out;
    }

    public function getNumPage()
    {
        return $this->numPage;
    }
}