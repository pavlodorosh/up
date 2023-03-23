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


$a1 = \app\A::getInstanse();
$a2 = \app\A::getInstanse();


var_dump($a1);
echo '<br>';
echo '<br>';
var_dump($a2);

echo '<br>';
echo '<br>';

$b1 = \app\B::getInstanse();
$b2 = \app\B::getInstanse();


var_dump($b1);
echo '<br>';
echo '<br>';
var_dump($b2);
