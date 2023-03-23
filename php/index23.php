<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(-1);
/*
mysqli_connect() - Відкрити нове з'єднання з сервером MySQL. Повертає об'єкт з підключенням до сервера MySQL.

mysqli_connect_error() - Повертає опис останньої помилки підключення. Повідомлення про помилку. NULL, якщо помилка відсутня.

mysqli_set_charset() - Встановлює кодування

mysqli_query() - Виконує запит до бази даних. Повертає FALSE у разі невдачі. У разі успішного виконання запитів SELECT mysqli_query() поверне об'єкт mysqli_result. Для решти успішних запитів mysqli_query() поверне TRUE.

mysqli_fetch_all() - Вибирає всі рядки з результуючого набору і поміщає їх в асоціативний масив, звичайний масив або в обидва

mysqli_fetch_assoc() - Витягує результуючий ряд у вигляді асоціативного масиву. Повертає асоціативний масив, який відповідає результуючій вибірці або NULL, якщо інших рядів не існує.

mysqli_num_rows() - Отримує число рядів у результуючій вибірці.

mysqli_affected_rows() - Отримує кількість рядків, порушених попередньою операцією MySQL. Повертає кількість рядків, які торкнулися останнім INSERT, UPDATE, REPLACE або DELETE запитом. Ціле число, більше нуля, означає кількість порушених чи отриманих рядків. Нуль означає, що запитом виду UPDATE не оновлено жодного запису, або що жодний рядок не відповідає умові WHERE у запиті, або що запит ще не було виконано. Значення -1 свідчить про те, що запит повернув помилку.

mysqli_error() - Повертає рядок із описом останньої помилки.

mysqli_real_escape_string() - Екранує спеціальні символи в рядку, що використовується в SQL-запиті, беручи до уваги кодування з'єднання
*/

// $db = mysqli_connect('127.0.0.1', 'root1', 'root', 'up', 3306 ) or die ('error connection');
$db = @mysqli_connect('127.0.0.1', 'root', 'root', 'up', 3306 ) or die ('error connection');

// echo '<pre>';
// var_dump($db);
// echo '</pre>';

if(!$db) die(mysqli_connect_error());

// mysqli_set_charset($db, "utf8") or die('no connection db');
// $res = mysqli_query($db, "SELECT * FROM `customers`");
// var_dump($res);


// SHOW
$sql = "SELECT cname, city FROM `customers`";
$result = $db->query($sql);
$res = mysqli_query($db, $sql);
echo '<pre>';
var_dump($result);
echo '</pre>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
// echo '<pre>';
// var_dump($res);
// echo '</pre>';


// echo 'Відсутні параметри';
// $date = mysqli_fetch_all($res);
// $date = mysqli_fetch_all($res, MYSQLI_ASSOC);
// $date = mysqli_fetch_all($res, MYSQLI_NUM);
// $date = mysqli_fetch_all($res, MYSQLI_BOTH);
// echo '<pre>';
// print_r($date);
// echo '</pre>';
// echo '<br>';
// echo '<br>';
// echo '<br>';
// echo '<br>';

// $data2 = [];
// while( $row = mysqli_fetch_assoc($res)){
//     $data2[$row['cname']] = $row;
// }
// echo '<pre>';
// print_r($data2);
// echo '</pre>';

// echo mysqli_num_rows($res);

// if ($result->num_rows > 0) {
//     while($row = $result->fetch_assoc()) {
//         echo "<br> name: ". $row["cname"]. " - city: ". $row["city"].  "<br>";
//     }
// } else {
//     echo "0 results";
// }



// INSERT
$insert = "INSERT INTO `customers` (`cnum`, `cname`, `city`, `rating`, `snum`, `text`) VALUES
(2125, 'Andrey', 'London', 100, 1001, 'php')";

$res_insert = mysqli_query($db, $insert);
if($res_insert) echo "OK insert";
else echo "Error insert";
echo '<br>';
echo 'mysqli_error - '.mysqli_error($db);
echo '<br>';
echo 'mysqli_affected_rows - '.mysqli_affected_rows($db);
echo '<br>';
echo '<br>';
echo '<br>';

// UPDATE
$update = "UPDATE `customers` SET cname = 'UPDATE NAME' WHERE cnum = 2125";
$resUpdate = mysqli_query($db, $update) or die ( mysqli_error($db));
echo '<pre>';
print_r($resUpdate);
echo '</pre>';


//DELETE
$delete = "DELETE FROM  `customers` WHERE cnum = 2085";
$resdelete = mysqli_query($db, $delete) or die ( mysqli_error($db));
echo '<pre>';
print_r($resdelete);
echo '</pre>';


$str= "Ім'я";
$str = mysqli_real_escape_string($db, $str);
$insert = "INSERT INTO `customers` (`cnum`, `cname`, `city`, `rating`, `snum`, `text`) VALUES
(2128, '$str', 'London', 100, 1001, 'php')";
$res_insert = mysqli_query($db, $insert);
if($res_insert) echo "OK insert";
else echo "Error insert";
echo '<br>';
echo 'mysqli_error - '.mysqli_error($db);