<?php

$y = 100;
$i = 5;

$varfn = fn($i) => $i + $y;

function sumnumber ($i, $j){
    return $i +$j;
}

echo $varfn($i);
echo '<pre>';
var_dump($varfn(3));
echo '</pre>';
echo '<br>';
echo '<br>';

echo '<pre>';
print_r($varfn(3));
echo '</pre>';


$my_array_keys = function ($arr){
    $date = [];
    foreach ($arr as $k => $v){
        $date[] = $k;
    }
    return $date;
};

function my_array_keys($arr){
    $date = [];
    foreach ($arr as $k => $v){
        $date[] = $k;
    }

    return $date;
}

$um = [1,2,3];
$name = ['Nazar', 'Taras', 'Max', 'Andriy', 'Olga'];
$name2 = [ 'name' => ' Andriy', 'year' => 22];
$test = [];

// $my_array_keys = 123;

$key2 = $my_array_keys($name);
echo '<pre>';
print_r($key2);
echo '</pre>';







echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
