<?php
require_once '/../DB.php';

$time = time();
$author = $_POST['author'];
$message = $_POST['message'];

$db = DB::DBInstance()->DB();
$stmt = $db->prepare('INSERT INTO message (id, time, author, message) VALUES (null, :time, :author, :message)');
$stmt->execute(array(':time' => $time, ':author' => $author, ':message' => $message));
echo 'TRUE';