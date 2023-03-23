<?php

class Car
{

    public $color;
    public $wheels = 4;
    public $speed = 180;
    public $brand;
    public $dbconnection;

    public function __construct($color, $wheels = 4, $speed, $brand)
    {
        echo __METHOD__ . '<br>';
        $this->color = $color;
        $this->wheels = $wheels;
        $this->speed = $speed;
        $this->brand = $brand;

        // $this->dbconnection;
    }

    public function getCarInfo()
    {
        return
            "
        <h3>My car</h3>
        Колір: {$this->color}<br>
        К-ксть колес: {$this->wheels}<br>
        Швидкість: {$this->speed}<br>
        Бренд: {$this->brand}<br>
        ";
    }

    public function __destruct()
    {
        // echo __METHOD__.'<br>';
    }
}