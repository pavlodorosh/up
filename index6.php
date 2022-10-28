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

$a = 5;
$b = 6;
$c = 7;

if ( $a > 6 || $b > 7){
    echo '$a > 6';
// }else{
//     if( $b < 7 ){
//         echo '$b < 7';
//     }
//     if ( $a < 6){
//         echo '$a < 6';
//     }
}elseif($a < 6 || $b < 7 ){
    echo '$a < 6 || $b < 7';
}else{
    echo 'else';
}

echo '<br>';
echo '<hr>';

$var = 123;

if ( $var == 121){
    echo 121;
}elseif ( $var == 122 ){
     echo 121;
}elseif ( $var == 123 ){
    echo 123;
}else{
    echo 'NULL';
}
echo '<br>';
echo '<hr>';

$var = 150;
switch($var){
    case 121:
        echo '121';
        break;
    case 122:
        echo '122';
        break;
    case 123:
        echo '123';
        break;
    case 124:
        echo '124';
        break;
    default:
        echo 'NULL';
}

echo '<br>';
echo '<hr>';

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

$arr2[4] = 'Nazar';
$arr2[] = 'Nazar';

echo '<pre>';
print_r($arr2);
echo '</pre>';

echo '<br>';
echo '<hr>';

$goods_1[2] =     [
        'title' => 'iPhone 8 Plus',
        'price' => 200,
        'state' => 'used',
];
$goods_1[] =     [
        'title' => 'iPhone 8 Plus',
        'price' => 200,
        'state' => 'used',
];
$goods_1[] =     [
        '0' => 0,
        '1' => 1,
        '2' => 2,
];
$goods_1[] = [ 0, 1, 2,];

echo '<pre>';
print_r($goods_1);
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
