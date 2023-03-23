<?php

require_once 'classes/Cars.php';


echo Cars::$countCar;
echo '<br>';
$car1 = new Cars('black', 4, 280, 'bmw');
echo Cars::$countCar;
echo '<br>';
$car2 = new Cars('white', 4, 240, 'toyota');
echo Cars::$countCar;
echo '<br>';
$car3 = new Cars('green', 4, 180, 'jeep');
echo Cars::$countCar;
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';

echo Cars::getCount();
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';

echo $car1->getCarInfo();

echo Cars::getCount();


echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';

echo $car1->getPrototypeInfo();
echo '<br>';

echo Cars::TEST_CAR;
echo '<br>';
echo Cars::TEST_CAR_SPEED;
echo '<br>';