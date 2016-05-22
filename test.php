<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
session_start();
if (!isset($_SESSION['counter'])) $_SESSION['counter'] = 0;
echo session_id() . "Page was refreshed " . $_SESSION['counter']++ . " times. ";
echo "<br><a href=" . $_SERVER['PHP_SELF'] . ">refresh";
unset($_SESSION['counter']);