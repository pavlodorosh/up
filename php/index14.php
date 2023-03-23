<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

if (isset($_POST['send'])){
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    echo '<hr>';
}

if (isset($_GET['send'])){
    echo '<pre>';
    print_r($_GET);
    echo '</pre>';
    echo '<hr>';
}

?>

<form action="" method="POST">

<div>
    <input type="text" name="name" placeholder="Ввідіть Ім'я">
</div>
<div>
    <input type="checkbox" name="CHECK" id="for_check" >
    <label for="for_check">CHECK</label>
</div>
<div>
    <input type="checkbox" name="CHECK2" id="for_check2" checked>
    <label for="for_check2">CHECK 2</label>
</div>
<div>
    <input type="radio" name="olds" value="15" id="olds15">
    <label for="olds15">15</label>
    <input type="radio" name="olds" value="25" id="olds25">
    <label for="olds25">25</label>
    <input type="radio" name="olds" value="55" id="olds35">
    <label for="olds35">35</label>
    <input type="radio" name="olds" value="55" id="olds45">
    <label for="olds45">45</label>
    <input type="radio" name="olds" value="55" id="olds55">
    <label for="olds55">55</label>
</div>
<div>
    <select name="lavel" id="" >
        <option value="level 1">level 1</option>
        <option value="level 2">level 2</option>
        <option value="level 3">level 3</option>
        <option value="level 4">level 4</option>
        <option value="level 5">level 5</option>
    </select>
</div>
<div>
    <select name="lang[]" id="" multiple>
        <option value="UK">UK1</option>
        <option value="ENG">ENG</option>
        <option value="DE">DE</option>
    </select>
</div>
<div>
    <textarea name="text"  placeholder="Ввідіть текст"></textarea>
</div>
<div>
    <button type="reset">Reset</button>
    <button type="submit" name="send" value="send">Send</button>
</div>

</form>

<?php if (isset($_POST['send'])){?>
    <div> Введенна інформація:</div>
    <?php if(!empty($_POST['name'])){ ?>
        <div> Ім'я: <?php echo $_POST['name']; ?></div>
    <?php }?>

    <div> Текст: <?php echo !empty($_POST['text']) ? nl2br($_POST['text']) : 'коментарі відсутні'; ?> </div>

    <div>CHECK: <?php echo !empty($_POST['CHECK'])&&$_POST['CHECK']=='on'? 'CHECK' : 'NO CHECK'; ?></div>
    <div>CHECK 2: <?php echo !empty($_POST['CHECK2'])&&$_POST['CHECK2']=='on'? 'CHECK 2' : 'NO CHECK2'; ?></div>

    <div></div>
<?php } ?>


<?php

/*
https://www.php.net/manual/ru/reserved.variables.php
*/

echo '<pre>';
echo '</pre>';
echo '<hr>';


?>
<?php
date_default_timezone_set('Europe/Amsterdam');

$t = "10:00";
$t1 = "10:01";
$t2 = "10:04";
$t3 = "10:06";

$date = date('h:i');

preg_match("/([0-9]{1,2}):([0-9]{1,2})/", $t3, $match);
$hour = $match[1];
$min = $match[2];

if($min % 5 >= 3){
    $light = "red";
}else{
  $light = "green";
}

echo 0%5 ;
echo '<br>';
echo 1%5 ;
echo '<br>';
echo 2%5 ;
echo '<br>';
echo 3%5 ;
echo '<br>';
echo 4%5 ;
echo '<br>';
echo 5%5 ;
echo '<br>';
echo 6%5 ;
echo '<br>';
echo 7%5 ;
echo '<br>';
echo 8%5 ;
echo '<br>';
echo 9%5 ;
echo '<br>';
echo '<br>';
echo '<br>';


//echo $date;
echo $min;
echo $light;

?>
<a href="/index15.php">index15</a>


</body>
</html>
