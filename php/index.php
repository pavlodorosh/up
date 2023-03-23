
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- <link rel="stylesheet" href=""> -->
    <!-- -->
</head>
<body>
    <h1>PHP урок №1</h1>
    <?php
        // одностроковий коментар
        // echo '<h2>Команада echo</h2>';
        /*
        багатостроковий коментар
        echo '<h2>Команада echo</h2>';
        */

        echo '<h2>Команада echo</h2>';
    ?>

    <?php
       echo '<h2>Перемінні</h2>';

       $a;
       //echo $a.'<br/>';
       //print_r($a).'<br/>';
       var_dump($a).'<br/>';

       echo '<br/>';
       $a = 159;
       echo $a.'<br/>';

       $a = 147.52;
       echo $a.'<br/>';

       $a = 'text vaule';
       echo $a.'<br/>';

       $a ='159';
       echo $a.'<br/>';

       $title = 'title_text';
       echo $title.'<br/>';

       $subtitle = "subtitle";
       echo $subtitle.'<br/>';

       $result_text = "Result text {$title}";
       echo $result_text.'<br/>';
    ?>
    <h2>
        <?php echo 'Константи';?>
        <?php //'Константи';?>
    </h2>
    <?php
        $newValue = 1245;
        define("oldVelue", "1459");
        // echo $oldVelue;
        echo oldVelue;

        echo '<br/>';
        echo '<br/>';

        // define("oldVelue", 74569);
        // echo oldVelue;

        const oldVelue2 = "7452365";
        echo oldVelue2;

    ?>
    <hr>
    <?php
        echo '<h2>Типи даних</h2>';
        /*
        boolean true | false
        integer (int)
        float 4.32
        string

        */
        $var = true;
        echo $var;
        echo '<br/>';
        var_dump($var);
        echo '<br/>';
        echo gettype($var);

        echo '<br/>';
        echo '<hr>';

        $var1 = 76688;
        echo $var1;
        echo '<br/>';
        var_dump($var1);
        echo '<br/>';
        echo gettype($var1);

        echo '<br/>';
        echo '<hr>';

        $var2 = 3.14123456789;
        echo $var2;
        echo '<br/>';
        var_dump($var2);
        echo '<br/>';
        echo gettype($var2);

        echo '<br/>';
        echo '<br/>';

        echo (int)$var2;
        echo '<br/>';
        var_dump((int)$var2);
        echo '<br/>';
        echo gettype((int)$var2);

        echo '<br/>';
        echo '<hr>';

        $var3 = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec arcu lectus, placerat vel neque viverra, sodales tempor lectus. In sit amet nulla in elit euismod dignissim. Aliquam aliquet nunc quis tincidunt posuere. Vivamus nec eros a ante sodales varius quis eu nisl. Sed euismod quam non massa aliquam pulvinar non varius mi. Sed finibus neque sit amet consectetur tincidunt. Nulla ultrices, ex eu facilisis lobortis, lorem magna consequat elit, sed placerat risus quam sit amet nulla. Phasellus dapibus leo vel libero tristique dapibus. Sed pretium finibus efficitur. '."Mauris a neque quis arcu pulvinar fringilla et vitae sapien. Nam dictum feugiat mauris, a luctus est semper et. Ut leo risus, hendrerit laoreet eros et, mattis pellentesque est.";
        echo $var3;
        echo '<br/>';
        var_dump($var3);
        echo '<br/>';
        echo gettype($var3);

        echo '<br/>';
        echo '<hr>';
    ?>

</body>
</html>
