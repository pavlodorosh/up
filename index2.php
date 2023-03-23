<?php

require_once 'classes/File.php';

//E:\OpenServer\domains\up\file.txt
//__DIR__ . '/file.txt'

$file = new File(__DIR__ . '/file.txt');

$file->write('text1');
$file->write('text1');
$file->write('text1');
$file->write('text1');
$file->write('text1');