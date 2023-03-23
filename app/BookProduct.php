<?php
namespace app;

use up\interfaces\I3D;
use up\Product;

class BookProduct extends Product implements I3D
{
    public $numPage;
    public $action1;
    public $action2;

    public $author = "N/a";
    public $year = "N/a";

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

    public function __toString()
    {
        echo __METHOD__ . '<br>';
        return $this->getProduct();
    }

    public function __set($name,$value)
    {
        echo __METHOD__ . '<br>';
        var_dump($name, $value);
    }

    public function __get($name)
    {
        // echo 'echo';
        // $name = ucfirst($name);
        // $method = "get{$name}";
        // if(method_exists($this, $method)){

        //     return $this->$method();
        // }
        echo __METHOD__ . '<br>';
        var_dump($name);
        return var_dump($name);
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

    public function doAction1()
    {
        echo $this->action1 = 'DO action 1';
        return $this;
    }
    public function doAction2()
    {
        echo $this->action2 = 'DO action 2';
        return $this;
    }


}