<?php
$headers = apache_request_headers();

foreach ($headers as $header => $value) {
    echo "$header: $value <br />\n";
}
//header("HTTP/1.1 301 Moved Permanently");
//header("HTTP/1.0 404 Not Found");
header("Location: еееredirect-test.php");
//exit;