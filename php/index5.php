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


for ($i = 0; $i < count($arr); $i++ ){
    // echo "element - {$i} value - {$arr[$i]}";
    echo "element - {$i} value - {$arr[$i]} <br>";
}

echo '<br>';
echo '<hr>';

for ($i=0; $i < count($goods); $i++){
    //echo $goods[$i];
    echo '<pre>';
    print_r($goods[$i]);
    echo '</pre>';

    echo '<br>';
    for ($j = 0; $j <count($goods[$i]); $j++ ){
        echo 'element -'.$i.' value -'.$goods[$i][$j].'<br>';
    }
    echo '<br>';
    foreach ($goods[$i] as $value){
        echo $value.'<br>';
    }
    echo '<br>';
    foreach ($goods[$i] as $key => $value){
        echo 'key -'.$key.' value -'.$value.'<br>';
    }
    echo '<br>';
    foreach ($goods[$i] as $key => $value){
        echo 'key -'.$key.' value -'.$goods[$i][$key].'<br>';
    }
}

echo '<br>';
echo '<hr>';

foreach ($goods as $good){
    foreach($good as $key => $value){
        echo 'key -'.$key.' value -'.$value.'<br>';
        echo '<br>';
    }
}

// mail('dpm1987@gmail.com', 'mail from uprise', 'uprise lessons 26');


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
