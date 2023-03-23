<?php

require_once 'classes/FirstClass.php';
require_once 'classes/Car.php';

function debug($date){
    echo '<pre>'.print_r($date,1).'</pre>';
    echo '<pre>'.var_dump($date).'</pre>';
}

$classes1 = new FirstClass;
$classes2 = new FirstClass;

var_dump($classes1);
var_dump($classes2);


// $car1 = new Car();
// $car1->color = 'black';
// $car1->brand = 'volvo';

// $car2 = new Car();
// $car2->year = 2015;
// $car2->color = 'white';
// $car2->brand = 'VW';
// $car2->speed = 220;

// var_dump($car1);
// var_dump($car2);


$car3 = new Car('black', 4, 280, 'bmw');


// debug($car2);
// debug($car1);
debug($car3);


// echo
// "<h3>My car</h3>
// Колір: {$car1->color}<br>
// К-ксть колес: {$car1->wheels}<br>
// Швидкість: {$car1->speed}<br>
// Бренд: {$car1->brand}<br>
// ";

// echo $car1->getCarInfo();
// echo $car2->getCarInfo();
echo $car3->getCarInfo();
