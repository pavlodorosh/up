<?php

/*
http://php.net/manual/ru/ref.datetime.php

string date ( string $format [, int $timestamp = time() ] )
int time ( void )
string date_default_timezone_get ( void )
bool date_default_timezone_set ( string $timezone_identifier )
array getdate ([ int $timestamp = time() ] )
int strtotime ( string $time [, int $now = time() ] )
int mktime ([ int $hour = date("H") [, int $minute = date("i") [, int $second = date("s") [, int $month = date("n") [, int $day = date("j") [, int $year = date("Y") [, int $is_dst = -1 ]]]]]]] )

DateTime date_create ([ string $time = "now" [, DateTimeZone $timezone = NULL ]] )
DateTime date_add ( DateTime $object , DateInterval $interval )
string date_format ( DateTimeInterface $object , string $format )
date_interval_create_from_date_string()
DateInterval date_diff ( DateTimeInterface $datetime1 , DateTimeInterface $datetime2 [, bool $absolute = false ] )
*/

echo date('c');
echo '<br>';
echo date('d-m-Y');
echo '<br>';
echo date('D-M-Y H:i:s');
echo '<br>';

/*
string date_default_timezone_get ( void )
bool date_default_timezone_set ( string $timezone_identifier )
*/
echo '<hr>';

echo date_default_timezone_get();
echo '<br>';

date_default_timezone_set('Africa/Dakar');
echo date_default_timezone_get();
echo '<br>';
echo date('d-m-Y  H:i:s');
echo '<hr>';

echo time();
echo '<br>';

echo date('d-m-Y  H:i:s', time()-60*60*24);
echo '<br>';
echo '2012 - '.date('Y');
echo '<hr>';

$date = getdate();
echo '<pre>';
print_r($date);
echo '</pre>';

echo '<hr>';

echo date('d-m-Y  H:i:s', strtotime("+11 day 2 hours") );
echo '<br>';
$t = mktime( date("H"), date("i")+12, date("s")+52, date("m"), date("d"), date("Y")-1);
echo $t;
echo '<br>';
echo date("Y-m-d H:i:s", $t);

echo '<hr>';

$date = date_create("2025-12-31");
echo '<pre>';
var_dump($date);
echo '</pre>';
echo '<br>';
echo date_format($date, 'd-m-Y');

echo '<hr>';

date_add($date , date_interval_create_from_date_string('2 days + 2 hours + 50 minutes'));

echo date_format($date, 'Y-m-d H:i:s');


echo '<hr>';
echo 'time - '.time();
echo '<br>';
echo 'microtime -'.microtime();
echo '<br>';
var_dump(microtime(true));
echo '<hr>';

$date1 = date_create('2022-11-04');
$date2 = date_create('2022-02-24');

$diff = date_diff($date1,$date2);
echo '<pre>';
var_dump($diff);
echo '</pre>';
echo '123'.$diff->format("%R%a days");

echo '<br>';


$diff2 = date_diff($date2,$date1);
echo '<pre>';
var_dump($diff2);
echo '</pre>';
echo $diff2->format("%R%a days");


$date1 = date_create('2022-02-24 04:30:56');
$date2 = date_create(date("Y-m-d H:i:s"));

$diff = date_diff($date1,$date2);
echo '<pre>';
var_dump($diff);
echo '</pre>';
echo $diff->format("%R%a days");

echo '<br>';


$diff2 = date_diff($date2,$date1);
echo '<pre>';
var_dump($diff2);
echo '</pre>';
echo $diff2->format("%R%a days");
echo '<br>';
echo '<hr>';
/* Визначити скільки часу потрібно для пребирання масиву розміром 10 млн значень */

$n = 10000000;
$myArray = array_fill(0, $n, '');

$start = microtime(true);
echo 'Сатрт відліку = '.$start;
echo '<br>';
foreach($myArray as $key => $value){
    if ($key == array_key_first($myArray)){
        echo '<br>';
        echo 'Старт';
        echo '<br>';
    }
    if ($key == array_key_last($myArray)){
        echo 'Фініш';
        echo '<br>';
    }
}
echo '<br>';
$end = microtime(true);
echo 'Завершення відліку = '.$end;
echo '<br>';
$result = $end - $start;
echo 'Час виконання = '.$result;




echo '<pre>';
echo '</pre>';
echo '<hr>';


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
