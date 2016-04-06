<?php
require_once '/../DB.php';

$time = time();
$author = $_POST['author'];
$message = $_POST['message'];

$db = DB::DBInstance()->DB();
$stmt = $db->prepare('INSERT INTO message (id, time, author, message) VALUES (null, :time, :author, :message)');
$stmt->execute(array(':time' => $time, ':author' => $author, ':message' => $message));
//$author = $db->quote($author);
//$message = $db->quote($message);
//$db = $db->query("INSERT INTO message (id, time, author, message) VALUES (null, $time, $author, $message)");
header("Location: http://learning-project.local/sql_inject/ajax_chat.html"); /* Redirect browser */
exit();