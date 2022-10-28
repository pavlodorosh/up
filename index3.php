<?php


echo '<br>';
echo '<hr>';

$i = 0;
while( $i <= 10 ){
    echo $i.'<br>';
    $i++;
}

echo '<br>';
echo '<hr>';

$i = 1;
echo '<table border="1">';
while($i<=15){
    echo "\t<tr>\n";
    $n = 1;
    while($n<=5){
        echo "\t\t<td> Row - {$i} | Col - {$n} </td>";
        $n++;
    }
    echo "\t</tr>\n";
    $i++;
}
echo '</table>';

echo '<br>';
echo '<hr>';


$year = 1900;
$i = 3;
echo '<select>'."\n";
    while($i<=5){
        echo "\t<option value={$year}>".$year."</option>";
        $year++;
        $i++;
    }
echo '</select>';

echo '<br>';
echo '<hr>';
$i = 1;
while($i<=10){
    echo $i++;
    // echo ++$i;
}

echo '<br>';
echo '<hr>';

$i = 1997;
do{
    echo 'do-while year - '.$i++;
}while( $i <= 1996);

echo '<br>';
echo '<hr>';
$i = 1997;
while($i <= 1996){
    echo 'while  year - '.$i++;

}
echo '<br>';
echo '<hr>';

$arr1 = [];
$arr2 = array();

$arr1 = [1, '2', 3, 5];
$arr2 = array(6, 7, '8', 9);

echo "<pre>";
var_dump($arr1);
echo "</pre>";

echo "<pre>";
print_r($arr2);
echo "</pre>";

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
echo "<pre>";
var_dump($goods);
echo "</pre>";

echo "<pre>";
print_r($goods);
echo "</pre>";

echo $goods[1]['title'];
echo $goods[1]['price'];
echo $goods[1]['state'];

echo '<br>';
echo '<hr>';




$array_table = [];
$i = 1;
while($i<=15){
    $n = 1;
    while($n<=5){
        $array_table[$i][$n] = 'Row - '.$i.' | Col - '.$n;
        $n++;
    }
    $i++;
}

echo "<pre>";
print_r($array_table);
echo "</pre>";

echo $array_table[2][3];


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

$arr2 = array(1,2,3,4,5,6,7);
$arr2 = array(
    1,
    array(
        1,
        2,
        3,
        4
    ),
    3,
    4,
    5,
    6,
    7);

$arr2[0];
$arr2{0};
$array3 = [
            'title' => 'iPhone 12 pro MAX',
            'price' => 800,
            'state' => 'new',
        ];

echo '$array3 -'.$array3['title'];
echo '<br>';
echo '<br>';
echo '$array3 -'.$array3['0'];
echo '<br>';
echo '<br>';
echo '$array3 -'.$array3[0];
echo '<br>';
echo '<br>';
print_r($array3);
echo '<br>';
echo '<br>';
var_dump($array3);