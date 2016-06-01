<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
if (!isset($_SESSION['counter'])) $_SESSION['counter'] = 0;
echo session_id() . " Page was refreshed " . $_SESSION['counter']++ . " times. ";
echo "<br><a href=" . $_SERVER['PHP_SELF'] . ">refresh</a>";

$params = session_get_cookie_params();
setcookie(session_name(), '', time() - 42000,
    $params["path"], $params["domain"],
    $params["secure"], $params["httponly"]
);
var_dump($_SESSION);
