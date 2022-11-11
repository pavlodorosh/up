<?php
echo '<pre>';
var_dump($_COOKIE);
echo '</pre>';

setcookie('test2', 'Andr', time()+3600*24, '/');