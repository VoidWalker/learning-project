<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once 'DB.php';

class Main
{
    public $db;

    public static function init()
    {
        DB::DBInstance()->DB();
    }
}