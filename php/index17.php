<?php

session_start();
define('ADMIN', 'admin');
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
if(!empty($_POST['login'])){
    if($_POST['login']==ADMIN){
        $_SESSION['admin'] = ADMIN;
        $_SESSION['res'] = 'Ви завторизованні';
    }else{
        $_SESSION['res'] = 'Ви незавторизованні';
    }
    // header("Location: index17.php");
    // die();
}
?>

<?php if( $_SESSION['admin'] == ADMIN){ ?>
<ul>
    <li>
        <a href="/index17.php">index17.php</a>
        <a href="/index18_admin.php">index18_admin.php</a>
    </li>
</ul>

<a href="index17.php?do=logout">Logout</a>
<?php } ?>

<?php
if (isset($_GET['do']) && $_GET['do'] == 'logout' ){
    unset($_SESSION['admin']);
    echo '<br>';
    echo 'Ви вийшли';
}
?>
