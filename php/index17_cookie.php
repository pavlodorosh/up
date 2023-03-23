<?php
define('ADMIN', 'admin');
?>

<?php if( $_COOKIE['admin'] != ADMIN){ ?>
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
        setcookie('admin', 'admin', time()+3600*24 , '/');
    }else{
        setcookie('admin', 'admin', time()-3600 , '/' );
    }
    header("Location: index17_cookie.php");
    die();
}
?>

<?php if( $_COOKIE['admin'] == ADMIN){ ?>
<ul>
    <li>
        <a href="/index17_cookie.php">index17_cookie.php</a>
        <a href="/index18_admin_cookie.php">index18_admin_cookie.php</a>
    </li>
</ul>

<a href="index17_cookie.php?do=logout">Logout</a>
<?php } ?>

<?php
if (isset($_GET['do']) && $_GET['do'] == 'logout' ){
    setcookie('admin', 'admin', time()-3600 , '/');
    setcookie('logout', 'Ви незаавторизовані', time()+5 , '/');
    header("Location:index17_cookie.php");
}
?>

<?php
if( isset($_COOKIE['logout']) ){
    echo $_COOKIE['logout'];
}

?>
