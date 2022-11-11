<?php


if (isset($_GET['do']) && $_GET['do'] == 'logout' ){
    setcookie('admin', 'admin', time()-3600 , '/' );
    echo 'Ви вийшли';
    header("Location:index18_admin_cookie.php");
}

if( !isset($_COOKIE['admin']) ) die('Ви незавторизованні');

echo 'Ми раді Вас вітатити - '.$_COOKIE['admin'];
?>

<ul>
    <li>
        <a href="/index17_cookie.php">index17_cookie.php</a>
        <a href="/index18_admin_cookie.php">index18_admin_cookie.php</a>
    </li>
</ul>

<a href="index18_admin_cookie.php?do=logout">Logout</a>
