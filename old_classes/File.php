<?php

class File
{
    public $fileopen;
    public $file;
    //E:\OpenServer\domains\up\file.txt

    public function __construct($file)
    {
        $this->file = $file;
        if (!is_writable($this->file)) {
            echo "Файл недоступний {$this->file} для запису";
            exit;
        }
        $this->fileopen = fopen($this->file, 'a');
        echo __METHOD__ . '<br>';
    }

    public function __destruct()
    {
        fclose($this->fileopen);
        echo __METHOD__ . '<br>';
    }

    public function write($text)
    {
        if (fwrite($this->fileopen, $text . PHP_EOL) === FALSE) {
            echo "Неможливо записати до файлу - {$this->file}";
            exit;
        }
    }
}