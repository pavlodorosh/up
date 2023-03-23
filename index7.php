<?php


error_reporting(-1);

use classes\{BookProduct, Notebook};
use classes\interfaces\{IGadget, I3D};

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailermy/src/Exception.php';
require 'phpmailermy/src/PHPMailer.php';
require 'phpmailermy/src/SMTP.php';

function autoloader1($class)
{
    $class = str_replace("\\", '/', $class);
    $file = __DIR__ . "/{$class}.php";
    // exit($file);
    echo $file . '<br>';
    if (file_exists($file)) {
        require_once($file);
    }
}
spl_autoload_register('autoloader1');


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

debug($book);
debug($notebook);

var_dump($notebook instanceof IGadget);
var_dump($book instanceof IGadget);


$mail = new \PHPMailer\PHPMailer\PHPMailer(true);

debug($mail);