<?php
namespace classes;

use classes\interfaces\I3D;

class BookProduct extends Product implements I3D
{
    public $numPage;

    // const TEST = 15;

    public function __construct($name, $price, $numPage)
    {
        // echo __METHOD__ . '<br>';
        // $this->name = $name;
        // $this->price = $price;
        parent::__construct($name, $price);
        $this->numPage = $numPage;
        // var_dump($this->protected);
        // var_dump($this->public);
        // self::TEST = 15;

        $this->setDiscount(10);
        // var_dump(self::class);

    }

    public function test()
    {
        // var_dump(self::TEST2);
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

    public function addProduct($name, $price, $numPage = '')
    {
        var_dump($name);
        var_dump($price);
        var_dump($numPage);

    }
}