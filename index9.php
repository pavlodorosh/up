<?php
use PHPMailer\PHPMailer\PHPMailer;


error_reporting(-1);

use up\interfaces\{IGadget, I3D};

use app\BookProduct;
use app\Notebook;

require_once __DIR__ . '/vendor/autoload.php';

function debug($date)
{
    echo '<pre>' . print_r($date, 1) . '</pre>';
    echo '<pre>' . var_dump($date) . '</pre>';
}

function offerCase(IGadget $product)
{
    echo "<p>Чохол для гаджета - {$product->getName()}</p>";
}


$book = new BookProduct('Eliktonik', 20, 1539);
$notebook = new Notebook('Dell', 1000, 'AMD');

// debug($book);
// debug($notebook);

// var_dump($notebook instanceof IGadget);
// var_dump($book instanceof IGadget);


// $mail = new PHPMailer();
// debug($mail);


$a = new \app\A();
$b = new \app\B();

$a->getTest();
echo '<br>';
$b->getTest();
echo '<br>';
$b->getTest2();
echo '<br>';
$a->getTest2();
echo '<br>';

$book->doAction1();
echo '<br>';
$book->doAction2();
echo '<br>';
$book->doAction2()->doAction1();
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';

$book->name;
debug($book);

echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';

echo $book->name;

echo $book->getProduct();

echo $book;
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
echo '<br>';
echo '<br>';
echo '<br>';

$book->test = 'TEST CONTENT';
debug($book);



$book->test = 'TEST';
echo $book->test;
debug($book);
