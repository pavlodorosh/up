<?php

/*
http://php.net/manual/ru/ref.strings.php
http://php.net/manual/ru/ref.mbstring.php

array explode ( string $delimiter , string $string [, int $limit ] )
string implode ( string $glue , array $pieces ) || join()
string trim ( string $str [, string $character_mask = " \t\n\r\0\x0B" ] )
string rtrim ( string $str [, string $character_mask ] )
string ltrim ( string $str [, string $character_mask ] )
string md5 ( string $str [, bool $raw_output = false ] )
string sha1 ( string $str [, bool $raw_output = false ] )
string nl2br ( string $string [, bool $is_xhtml = true ] )

mixed str_replace ( mixed $search , mixed $replace , mixed $subject [, int &$count ] )
mixed str_ireplace ( mixed $search , mixed $replace , mixed $subject [, int &$count ] )
string strip_tags ( string $str [, string $allowable_tags ] )
int strlen ( string $string )

mixed mb_strlen ( string $str [, string $encoding = mb_internal_encoding() ] )
int mb_strpos ( string $haystack , string $needle [, int $offset = 0 [, string $encoding = mb_internal_encoding() ]] )
string mb_strtolower ( string $str [, string $encoding = mb_internal_encoding() ] )
string mb_strtoupper ( string $str [, string $encoding = mb_internal_encoding() ] )
string mb_substr ( string $str , int $start [, int $length = NULL [, string $encoding = mb_internal_encoding() ]] )
string htmlspecialchars ( string $string [, int $flags = ENT_COMPAT | ENT_HTML401 [, string $encoding = ini_get("default_charset") [, bool $double_encode = true ]]] )
string htmlspecialchars_decode ( string $string [, int $flags = ENT_COMPAT | ENT_HTML401 ] )
string htmlentities ( string $string [, int $flags = ENT_COMPAT | ENT_HTML401 [, string $encoding = ini_get("default_charset") [, bool $double_encode = true ]]] )
*/


$um = [1,2,3];
$name = ['Nazar', 'Taras', 'Max', 'Andriy', 'Olga'];
$name2 = [ 'name' => ' Andriy', 'year' => 22];
$test = [];


$names = 'Nazar 7 8 8 Taras                  Max       Andriy Olga 1 2 3';



echo $names;
echo '<hr>';
$date = explode(' ', $names);

echo '<pre>';
print_r($date);
echo '</pre>';

echo '<hr>';

echo implode(' ', $date);

echo '<hr>';

$names = trim($names, ' ');
$date = explode(' ', $names);
echo '<pre>';
print_r($date);
echo '</pre>';


$newDate = array_unique($date);
echo '<pre>';
print_r($newDate);
echo '</pre>';

echo implode(' ', $newDate);

echo '<hr>';

$pwd = 'password';
echo md5(md5($pwd));

echo '<hr>';
$names = 'Nazar 7 8 8 Taras                  Max       Andriy Olga 1 2 3';
echo $names;

echo '<hr>';

$newNames = str_replace(' ', '_', $names);

echo $newNames;
echo '<br>';
echo str_replace(' ', '_', $names);

$names = str_replace(' ', '_', $names);
echo '<br>';
echo $names;


/*
string strip_tags ( string $str [, string $allowable_tags ] )
int strlen ( string $string )

mixed mb_strlen ( string $str [, string $encoding = mb_internal_encoding() ] )
int mb_strpos ( string $haystack , string $needle [, int $offset = 0 [, string $encoding = mb_internal_encoding() ]] )
string mb_strtolower ( string $str [, string $encoding = mb_internal_encoding() ] )
string mb_strtoupper ( string $str [, string $encoding = mb_internal_encoding() ] )

*/
echo '<hr>';

$names = 'Nazar 7 8 8 Taras                  Max       Andriy Olga 1 2 3';
echo '<br>';
$names2 = 'Nazar 7 8 8 Taras                 <h1>Max</h1>        <h2>Andriy</h2> Olga 1 2 3';
$names2 = 'Nazar 7 8 8 Taras                  Max       Andriy Olga 1 2 3';
echo $names2;
echo '<br>';
echo strip_tags($names2);
echo '<br>';
echo strlen($names2);

echo '<br>';
echo strpos($names2, '125125');
echo '<br>';
echo strpos($names2, 'Max');
echo '<br>';
echo $newNames2 = strtolower($names2);
echo '<br>';
echo strtoupper($newNames2);
echo '<br>';
echo '<br>';
echo '<br>';

/*

string mb_substr ( string $str , int $start [, int $length = NULL [, string $encoding = mb_internal_encoding() ]] )
string htmlspecialchars ( string $string [, int $flags = ENT_COMPAT | ENT_HTML401 [, string $encoding = ini_get("default_charset") [, bool $double_encode = true ]]] )
string htmlspecialchars_decode ( string $string [, int $flags = ENT_COMPAT | ENT_HTML401 ] )
string htmlentities ( string $string [, int $flags = ENT_COMPAT | ENT_HTML401 [, string $encoding = ini_get("default_charset") [, bool $double_encode = true ]]] )

*/
echo '<br>';
echo substr($newNames2, -1);
echo '<br>';
echo substr($newNames2, 5, 10);
echo '<br>';
echo substr($newNames2, 5);
echo '<hr>';

$names2 = 'Nazar 7 8 8 Taras                  &lt;h1&gt;Max &lt;/h1&gt;         &lt;h2&gt;Andriy &lt;/h2&gt; Olga 1 2 3';
$names2 = 'Nazar 7 8 8 Taras                 <h1>Max</h1>        <h2>Andriy</h2> Olga 1 2 3';

echo '<br>';
echo 'Text:';
echo '<br>';
echo $names2;
echo '<hr>';

echo '<br>';
echo '<br>';
echo '<br>';

echo 'htmlspecialchars:';
echo '<br>';
echo htmlspecialchars($names2);
echo '<hr>';
echo '<br>';
echo htmlspecialchars_decode($names2);

/*
string sha1 ( string $str [, bool $raw_output = false ] )
string nl2br ( string $string [, bool $is_xhtml = true ] )
string htmlentities ( string $string [, int $flags = ENT_COMPAT | ENT_HTML401 [, string $encoding = ini_get("default_charset") [, bool $double_encode = true ]]] )
*/

echo '<hr>';
echo '<br>';
$names2 = 'Nazar 7 8 8 Taras                 <h1>Max</h1>        <h2>Andriy</h2> Olga 1 2 3';

echo htmlentities($names2);
echo '<br>';

echo sha1($names2);




echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
