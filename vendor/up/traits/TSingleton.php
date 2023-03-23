<?php

namespace up\traits;

trait TSingleton
{
    private static $instanse;

    private function __construct()
    {
        echo __METHOD__ . '<br>';
    }

    public static function getInstanse()
    {
        if(self::$instanse === null){
            self::$instanse = new self();
        }
        return self::$instanse;
    }
}