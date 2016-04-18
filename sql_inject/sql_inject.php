<?php
require_once '/../DB.php';

$time_value = time();
$author_value = $_POST['author'];
$message_value = $_POST['message'];

//$db = DB::DBInstance()->DB();
//$stmt = $db->prepare('INSERT INTO message (id, time, author, message) VALUES (null, :time, :author, :message)');
//$stmt->execute(array(':time' => $time, ':author' => $author, ':message' => $message));
//$author_value = $db->quote($author_value);
//$message_value = $db->quote($message_value);
var_dump($message_value);
$link = mysqli_connect("localhost", "root", "", "learning_db");
$author_value = mysqli_escape_string($link, $author_value);
$message_value = mysqli_escape_string($link, $message_value);
var_dump($message_value);
//$db = $db->query("INSERT INTO message (time, author, message) VALUES (NOW(), '$author_value', '$message_value')");
//header("Location: http://learning-project.local/sql_inject/ajax_chat.html"); /* Redirect browser */
exit();