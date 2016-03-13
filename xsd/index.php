<?php
$movies = simplexml_load_file('document.xml');
//$movies = new SimpleXMLElement($xml);
$character = $movies->movie[0]->characters->addChild('character');
$character->addChild('name', 'Mr. Parser');
echo "<pre>";
print_r($movies->movie);
echo "</pre>";
echo "<br />Test line: " . $movies->movie[0]->rating[1]['type'];
$xml = new DOMDocument();
$xml->load('document.xml');
echo "<br />" . $xml->schemaValidate('schema.xsd');
