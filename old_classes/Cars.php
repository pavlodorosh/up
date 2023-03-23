<?php

class Cars
{

    public $color;
    public $wheels;
    public $speed;
    public $brand;

    public static $countCar = 0;

    const TEST_CAR = 'Тестовий авто';
    const TEST_CAR_SPEED = 400;

    public function __construct($color, $wheels = 4, $speed = 180, $brand)
    {
        echo __METHOD__ . '<br>';
        $this->color = $color;
        $this->wheels = $wheels;
        $this->speed = $speed;
        $this->brand = $brand;

        self::$countCar++;
    }

    public function __destruct()
    {
        echo __METHOD__ . '<br>';
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

    public static function getCount()
    {
        return self::$countCar;
    }

    public function getPrototypeInfo()
    {
        return
            "
        <h3>TEST CAR</h3>
        Швидкість:" . self::TEST_CAR . "<br>
        Бренд:" . self::TEST_CAR_SPEED . "<br>
        ";
    }

}