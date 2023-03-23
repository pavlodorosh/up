<?php

/*
bool copy ( string $source , string $dest [, resource $context ] )
bool file_exists ( string $filename )
string file_get_contents ( string $filename [, bool $use_include_path = false [, resource $context [, int $offset = -1 [, int $maxlen ]]]] )
int file_put_contents ( string $filename , mixed $data [, int $flags = 0 [, resource $context ]] )
array file ( string $filename [, int $flags = 0 [, resource $context ]] )
bool is_dir ( string $filename )
bool is_file ( string $filename )
bool move_uploaded_file ( string $filename , string $destination )
bool rename ( string $oldname , string $newname [, resource $context ] )
bool mkdir ( string $pathname [, int $mode = 0777 [, bool $recursive = false [, resource $context ]]] )
bool rmdir ( string $dirname [, resource $context ] )
bool touch ( string $filename [, int $time = time() [, int $atime ]] )
bool unlink ( string $filename [, resource $context ] )
*/

copy('text.txt', 'folder/text.txt');

if(file_exists('folder/text.txt')){
    echo 'Файл існує';
}else{
    echo 'Файл не існує';
}
echo '<br>';
echo '<hr>';
echo '<br>';

$file = file_get_contents('text.txt');

echo $file;

echo '<br>';
echo '<hr>';
echo '<br>';

echo nl2br($file);

echo '<br>';
echo '<hr>';
echo '<br>';

$fileWeb = file_get_contents('https://php.net/');
echo $fileWeb;

echo '<br>';
echo '<hr>';
echo '<br>';

file_put_contents('folder/localfole.txt', $file );
file_put_contents('folder/websitefile.txt', $fileWeb );

echo '<br>';
echo '<hr>';
echo '<br>';


$fileArray = file('text.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
echo '<pre>';
print_r($fileArray);
echo '</pre>';

$fileArray2 = file('text2.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
echo '<pre>';
print_r($fileArray2);
echo '</pre>';


echo '<br>';
echo '<hr>';
echo '<br>';

/*bool is_dir ( string $filename )
bool is_file ( string $filename )
bool move_uploaded_file ( string $filename , string $destination )
bool rename ( string $oldname , string $newname [, resource $context ] )
bool mkdir ( string $pathname [, int $mode = 0777 [, bool $recursive = false [, resource $context ]]] )
bool rmdir ( string $dirname [, resource $context ] )
bool touch ( string $filename [, int $time = time() [, int $atime ]] )
bool unlink ( string $filename [, resource $context ] )
*/

if (is_dir('folder')){
    echo 'Папки існує';
}else{
    echo 'Папки не існує';
}
echo '<br>';
echo '<hr>';
echo '<br>';

if (is_file('folder/websitefile.txt')){
    echo 'Файл існує';
}else{
    echo 'Файл не існує';
}
echo '<br>';
echo '<hr>';
echo '<br>';

rename('text.txt', 'text_new.txt');
mkdir('folder2/folder3', 0777, true);

touch('folder/localfole.txt', time()-3600*24);

unlink('folder/websitefile.txt');
