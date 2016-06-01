<?php


//procedure method
//$db_link = mysqli_connect("localhost", "root", "", "learning_db");
//if (!$db_link) {
//    die('Connection error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
//}
//
//echo "Connection established... " . mysqli_get_host_info($db_link) . "\n";
//
//res = mysqli_query($db_link, "SELECT 'Пожалуйста, не используюте ' AS _msg FROM DUAL");
//$row = mysqli_fetch_assoc($res);
//echo $row['_msg'];
//mysqli_close($db_link);


$mysqli = new mysqli('localhost', 'root', '', 'learning_db');

if ($mysqli->connect_error) {
    die('Connection error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
echo "Connection established... " . $mysqli->host_info . "\n";

$result = $mysqli->query("SELECT * FROM message");
echo "<pre>";
print_r($result->fetch_all());
echo "</pre>";
$mysqli->close();