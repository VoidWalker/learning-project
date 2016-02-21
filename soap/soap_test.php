<?php
$movies = simplexml_load_file('message.xml');
var_dump($movies);
echo '==============';
$xml = new DOMDocument();
$xml->load('message.xml');
echo "<br />" . $xml->schemaValidate('message.xsd');