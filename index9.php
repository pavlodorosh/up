<?php

require_once './';

$um = [1,2,3];
$name = ['Nazar', 'Taras', 'Max', 'Andriy', 'Olga'];
$name2 = [ 'name' => ' Andriy', 'year' => 22];
$test = [];

$a = 200;
$x = 100;
$y = 10;

sum();
sum(55,13);
sum($a,22);
sum($a,$x);
sum(100);
sum($y2 , 100);

echo '<hr>';

echo $a.'<br>';
sum2 ($a, $x);
echo $a.'<br>';

echo '<hr>';
$key = array_keys($name);
echo '<pre>';
print_r($key);
echo '</pre>';

echo '<hr>';

$key2 = my_array_keys($name);
echo '<pre>';
print_r($key2);
echo '</pre>';

echo '<hr>';

echo $date;