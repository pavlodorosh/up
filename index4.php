<?php


error_reporting(-1);
require_once 'classes/Product.php';
require_once 'classes/BookProduct.php';
require_once 'classes/NoteBook.php';

function debug($date)
{
    echo '<pre>' . print_r($date, 1) . '</pre>';
    echo '<pre>' . var_dump($date) . '</pre>';
}

// $book = new Product('Eliktonik', 20, null, 1000);
// $notebook = new Product('Dell', 1000, 'intel');

// debug($book);
// debug($notebook);

// echo '<br>';
// echo '<br>';
// echo '<br>';
// echo '<br>';
// echo $book->getNumberPage();
// echo '<br>';
// echo '<br>';
// echo '<br>';
// echo '<br>';
// echo $notebook->getNumberPage();



$book = new BookProduct('Eliktonik', 20, 1539);
$notebook = new Notebook('Dell', 1000, 'AMD');

debug($book);
debug($notebook);


echo $book->getProduct();
echo $notebook->getProduct();