<?php


error_reporting(-1);
// require_once 'classes/Product.php';
// require_once 'classes/I3D.php';
// require_once 'classes/IGadget.php';
// require_once 'classes/BookProduct.php';
// require_once 'classes/NoteBook.php';

use classes\BookProduct;
use classes\interfaces\I3D;
use classes\interfaces\IGadget;
use classes\Notebook;

// function autoloader1($class)
// {
//     $class = str_replace("\\", '/', $class);
//     $file = __DIR__ . "/classes/{$class}.php";
//     // exit($file);
//     echo $file . '<br>';
//     if (file_exists($file)) {
//         require_once($file);
//     }
// }
// function autoloader2($class)
// {
//     $file = __DIR__ . "/classes/interface/{$class}.php";
//     // exit($file);
//     echo $file . '<br>';
//     if (file_exists($file)) {
//         require_once($file);
//     }
// }

// spl_autoload_register('autoloader1');
// spl_autoload_register('autoloader2');


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


// // offerCase($book);
// offerCase($notebook);

// echo $notebook->getcase();

// class A
// {
// }
// ;
// class B extends A
// {
// }
// ;
// class C
// {
// }
// ;

// $a = new A;
// $b = new B;
// $c = new C;

// var_dump($b instanceof C);