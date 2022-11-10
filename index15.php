<?php
    echo '<pre>';
    print_r($_SERVER);
    echo '</pre>';

    echo 'PHP_SELF - '.$_SERVER['PHP_SELF'];
    echo '<br>';
    echo 'SERVER_NAME - '.$_SERVER['SERVER_NAME'];
    echo '<br>';
    echo 'QUERY_STRING - '.$_SERVER['QUERY_STRING'];
    echo '<br>';
    echo 'DOCUMENT_ROOT - '.$_SERVER['DOCUMENT_ROOT'];
    echo '<br>';
    echo 'HTTP_HOST - '.$_SERVER['HTTP_HOST'];
    echo '<br>';
    echo 'HTTP_REFERER - '.$_SERVER['HTTP_REFERER'];
    echo '<br>';
    echo 'REMOTE_ADDR - '.$_SERVER['REMOTE_ADDR'];
    echo '<br>';


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
<?php
    if(!empty($POST['send'])){
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
    }
    if(!empty($_FILES)){
        echo '<pre>';
        print_r($_FILES);
        echo '</pre>';
        // move_uploaded_file($_FILES['file']['tmp_name'], 'upload/'.$_FILES['file']['name']);

        $totla = count($_FILES['file']['name']);

        for ( $i = 0; $i<$totla; $i++ ){
            move_uploaded_file($_FILES['file']['tmp_name'][$i], 'upload/'.$_FILES['file']['name'][$i]);
        }
    }

?>

<!-- <form action="" method="POST" enctype="multipart/form-data">
    <div>
        <input type="text" placeholder="Ввідіть Ім'я" name="name">
    </div>
    <div>
        <textarea name="text"  placeholder="Ввідіть текст"></textarea>
    </div>
    <div>
        <input type="file" name="file">
    </div>
    <div>
        <button type="reset">Reset</button>
        <button type="submit" name="send" value="send">Send</button>
    </div>
</form> -->
<form action="" method="POST" enctype="multipart/form-data">
    <div>
        <input type="text" placeholder="Ввідіть Ім'я" name="name">
    </div>
    <div>
        <textarea name="text"  placeholder="Ввідіть текст"></textarea>
    </div>
    <div>
        <input type="file" name="file[]" multiple="multiple">
    </div>
    <div>
        <button type="reset">Reset</button>
        <button type="submit" name="send" value="send">Send</button>
    </div>
</form>



</body>
</html>