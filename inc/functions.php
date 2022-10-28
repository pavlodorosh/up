<?php

function sum( $a = 1 , $b = 2 ){
    echo $a + $b .'<br>';
}

function sum2 (&$val1 , $val2){
    echo $val1 + $val2.'<br>';
    $val1 = $val1 + $val2;
}

function my_array_keys($arr){
    $date = [];
    foreach ($arr as $k => $v){
        $date[] = $k;
    }

    return $date;
}