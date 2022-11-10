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



/*
if(!empty($_POST)){
echo '<pre>';
print_r($_POST);
echo '</pre>';
echo '<hr>';
}

if(!empty($_GET)){
echo '<pre>';
print_r($_GET);
echo '</pre>';
echo '<hr>';
}
*/

?>

<a href="index14.php">BACK</a>