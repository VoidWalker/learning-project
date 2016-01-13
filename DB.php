<?php

class DB
{
    protected $_db;

    public function __construct()
    {
        $dbName = "learning_db";
        $dsn = "mysql:host=localhost";
        $username = 'root';
        $password = '';
        $options = array(
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        $this->_db = new PDO($dsn, $username, $password, $options);
        $this->_db->query('CREATE DATABASE IF NOT EXISTS ' . $dbName);
        $this->_db->query('USE ' . $dbName);
    }

    public function DB()
    {
        return $this->_db;
    }
}