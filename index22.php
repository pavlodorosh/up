<?php
header("Content-type: text/html; charset=utf-8");
require_once 'functions.php';

if(!empty($_POST)){
   save_contact();
   header("Location:{$_SERVER['PHP_SELF']}");
   exit;
}

$contact = get_contact();
echo $contact;
echo '<pre>';
print_r($contact);
echo '</pre>';

echo '<br>';
echo '<hr>';
echo '<br>';

$contact = array_contacts($contact);
echo '<pre>';
print_r($contact);
echo '</pre>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
    <div>
        <input type="text" name="name" placeholder="Ім'я">
    </div>
    <div>
        <input type="text" name="surname" placeholder="Прізвище">
    </div>
    <div>
        <input type="tel"  name="phonenumber" placeholder="Номер телефону">
    </div>
    <div>
        <textarea name="comment" id="" placeholder="Коментар" ></textarea>
    </div>
    <div>
        <button type="submit">Надіслати</button>
    </div>
</form>

</body>
</html>