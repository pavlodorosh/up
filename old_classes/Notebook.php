<?php

class Notebook extends Product
{
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
}