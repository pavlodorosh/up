<?php

setcookie('test', 'Naz', time()+3600*24 , '/');

// setcookie('test', 'Naz', time()-3600);



echo '<pre>';
var_dump($_COOKIE);
echo '</pre>';

// if(isset($_COOKIE['counter'])){
//     setcookie('counter', ++$_COOKIE['counter'], time()+3600*24, '/');
// }else{
//     setcookie('counter', 1 , time()+3600*24 , '/');
// }


// isset($_COOKIE['counter']) ?
// setcookie('counter', ++$_COOKIE['counter'], time()+3600*24, '/') :
// setcookie('counter', 1 , time()+3600*24 , '/');

isset($_COOKIE['counter']) ? setcookie('counter', ++$_COOKIE['counter'], time()+3600*24, '/') : setcookie('counter', 1 , time()+3600*24 , '/');

echo isset($_COOKIE['counter']) ? $_COOKIE['counter'] : 1;