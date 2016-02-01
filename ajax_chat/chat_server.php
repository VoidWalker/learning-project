<?php
//require_once  '/../DB.php';



function refreshChat()
{
    $db = DB::DBInstance()->DB();
    $stmt = $db->query("SELECT * FROM message");
    while ($row = $stmt->fetchObject()) {
        foreach ($row as $column => $value) {
            echo "-" . $column . "=>" . $value . "<br />";
        }
        echo "<hr>";
    }
}

refreshChat();

