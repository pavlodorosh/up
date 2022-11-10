<?php
session_start();

echo session_id();


// $_SESSION['name'] = "NAZ";
// $_SESSION['time'] = date('H:i:s');


// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';
// echo '<hr>';

// unset($_SESSION['name']);
// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';
// echo '<hr>';


// session_unset();
// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';
// echo '<hr>';

// session_decode();
// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';
// echo '<hr>';

define('ADMIN','admin');

if(!empty($_POST['login'])){
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';

    if($_POST['login'] == ADMIN ){
        $_SESSION['admin'] = ADMIN;
        $_SESSION['res'] = 'Ви завторизованні';
    }else{
        $_SESSION['res'] = 'Логін невірний';
    }
    header("Location:index16.php");
    die;
}
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
echo '<hr>';

?>

<?php
if(isset($_SESSION['res'])){
    echo $_SESSION['res'];
}
?>

<?php if( $_SESSION['admin'] != ADMIN){ ?>
<form action="" method="POST">
    <div>
        <input type="text" placeholder="Ввідіть логін" name="login">
    </div>
    <div>
        <button type="reset">Reset</button>
        <button type="submit" name="send" value="send">Send</button>
    </div>
</form>
<?php } ?>

<?php
if (isset($_GET['do']) && $_GET['do'] == 'logout' ){
    unset($_SESSION['admin']);
    unset($_SESSION['res']);
    echo 'Ви вийшли';
}
?>
<?php if( $_SESSION['admin'] == ADMIN){ ?>
    <a href="index16.php?do=logout">Logout</a>
<?php } ?>
