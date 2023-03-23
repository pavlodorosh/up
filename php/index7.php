<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Товари</h1>

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
?>
<div class="googds">
    <div class="good item_<?php echo $i;?>">
        <div class="lable title">
            iPhone 12 pro MAX
        </div>
        <div class="lable price">
            800
        </div>
        <div class="lable state">
            used
        </div>
    </div>
</div>
<div class="googds">
    <div class="good item_<?php echo $i;?>">
        <div class="lable title">
            iPhone 12 pro MAX
        </div>
        <div class="lable price">
            800
        </div>
        <div class="lable state">
            used
        </div>
    </div>
</div>
<div class="googds">
    <div class="good item_<?php echo $i;?>">
        <div class="lable title">
            iPhone 12 pro MAX
        </div>
        <div class="lable price">
            800
        </div>
        <div class="lable state">
            used
        </div>
    </div>
</div>
<?php $i = 1;?>
<div class="googds <?php echo '123'; ?>">
    <?php foreach($goods as $good){?>
        <div class="good item_<?php echo $i;?>">
            <?php foreach($good as $key => $value){?>
                <div class="lable <?php echo $key?>">
                    <?php echo $value;?>
                </div>
            <?php } ?>
        </div>
    <?php $i++; ?>
    <?php } ?>
</div>
<?php
$i = 1;
echo '<div class="googds">';
foreach($goods as $good){
    echo '<div class="good item_'.$i.'">';
    foreach($good as $key => $value){
        echo '<div class="lable'.$key.'">';
        echo $value;
        echo '</div>';
    }
    echo '</div>';
$i++;
}
echo '</div>';
?>


</body>
</html>