<?php


error_reporting(-1);
require_once 'classes/Product.php';
require_once 'classes/I3D.php';
require_once 'classes/IGadget.php';
require_once 'classes/BookProduct.php';
require_once 'classes/NoteBook.php';

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


// offerCase($book);
offerCase($notebook);

echo $notebook->getcase();

class A
{
}
;
class B extends A
{
}
;
class C
{
}
;

$a = new A;
$b = new B;
$c = new C;

var_dump($b instanceof C);