<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$arrayNumbers = ['a' => -1, 'b' => 1, 'c' => -1, 'd' => -1, 'e' => 1, 'f' => 1, 'g' => -1];
$arrayAlphabet = ['d' => 'd', 'a' => 'a', 'b' => 'b', 'g' => 'g', 'c' => 'c', 'e' => 'e', 'f' => 'f'];
function sortByCriteria(&$countries)
{
    usort($countries, function ($a, $b) {
        ($a > $b) ? $test = 1 : $test = -1;
        return $test;
    });
}

sortByCriteria($arrayAlphabet);
var_dump($arrayAlphabet);
////////////
//$test = strcasecmp("A", "B");
//echo $test;