<?php
$goods = [
    [
        'title' => 'iPhone 12 pro MAX',
        'price' => 800,
        'state' => 'new',
    ],
    [
        'title' => 'iPhone 11 pro MAX',
        'price' => 600,
        'state' => 'new',
    ],
    [
        'title' => 'iPhone 8 Plus',
        'price' => 200,
        'state' => 'used',
    ],
];
$goods_1 = [
    [
        'title' => 'iPhone 12 pro MAX',
        'price' => 800,
        'state' => 'used',
    ],
    [
        'title' => 'iPhone 11 pro MAX',
        'price' => 800,
        'state' => 'new',
    ]
];

$arr = array('MAx', 'Olga', 'Taras', 'Andr', 'Nazar', 'Vlad');
$arr2 = array('MAx', 'Olga', 'Andr', 'Taras');

echo '<br>';
echo '<hr>';

echo '<br>';
echo '<hr>';

/*
count
array_diff
array_intersect
array_key_exists
array_keys
array_values
array_merge
array_rand
array_reverse
compact
extract
arsort
asort
sort
rsort

array_combine
array_search
array_shift
array_unique
array_unshift
array_flip
array_pop
array_push
in_array
list
*/

echo count($arr);


echo '<br>';
echo '<hr>';
echo '<pre>';
$res = array_diff($arr,$arr2);
print_r($res);
echo '</pre>';

echo '<br>';
echo '<hr>';

echo '<pre>';
print_r(array_keys($goods[0]));
echo '</pre>';


echo '<br>';
echo '<hr>';
echo (array_key_exists('title',$goods[0]));


echo '<br>';
echo '<hr>';
print_r(array_values($arr));
echo '<br>';
echo '<hr>';
print_r(array_values($goods[0]));
echo '<br>';
echo '<hr>';
echo '<pre>';
print_r(array_merge($goods, $goods_1, $arr, $arr2));
echo '</pre>';


echo '<br>';
echo '<hr>';

$a = 5;
$b = 6;
$c = 7;

if ( $a ){
    echo '$a ='.$a;
}
if ( !$a ){
    echo '$a ='.$a;
}
echo '<br>';
echo '<hr>';

if ( $a == 5 && $b > 5 && $c >= 7){
    echo '$a = '.$a.' $b > 5';
}
// if ( $a == 5 ){
//     if( $b > 5 ){
//         if( $c >= 7 ){
//             echo '$a = '.$a.' $b > 5';
//         }
//     }
//     echo '$a = '.$a.' $b > 5';
// }
if ( $a == 5 && $b > 5 && $c >= 7){
    echo '$a = '.$a.' $b > 5';
}

echo '<br>';
echo '<hr>';

if ( ($a >5 || $b >5 || $c >5 ) && $a ==5  ){
    echo 'a або b або c більше 5 ';
}


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
