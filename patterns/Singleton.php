<?php

class DB
{
    private static $_instance = null;

    public $objectVar = "test";

    public static function getInstance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    private function __construct()
    {
        $this->objectVar = "constructed";
    }

    private function __clone()
    {

    }
}

$db = DB::getInstance();
echo $db->objectVar;
