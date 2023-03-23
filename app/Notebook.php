<?php

namespace app;

use up\interfaces\IGadget;
use up\Product;
use up\traits\TColor;

class Notebook extends Product implements IGadget
{
    use TColor;

    // public function getColor()
    // {
    //     return $this->color;
    // }

    // public function setColor($color)
    // {
    //     $this->color = $color;
    // }


    public $cpu;


    public function __construct($name, $price, $cpu)
    {
        // echo __METHOD__ . '<br>';
        // $this->name = $name;
        // $this->price = $price;
        parent::__construct($name, $price);
        $this->cpu = $cpu;
    }

    public function getProduct()
    {
        // echo __METHOD__ . '<br>';
        $out = parent::getProduct();
        $out .= "Процесор:{$this->getCpu()}<br>";

        return $out;
    }

    public function getCpu()
    {
        return $this->cpu;
    }

    public function addProduct($name, $price, $cpu = '')
    {
        var_dump($name);
        var_dump($price);
        var_dump($cpu);
    }

    public function getcase()
    {
        echo __METHOD__ . '<br>';
    }
}