<?php
$requestTransformed = "";
if (!empty($_GET['value'])) {
    $request = $_GET['value'];
    $lastChar = substr($request, -1);
    $lastCharTransformed = isUpperCase($lastChar) ? strtolower($lastChar) : strtoupper($lastChar);
    $requestTransformed = $lastCharTransformed;

} else {
    $requestTransformed = "NoValue!";
}

function isUpperCase($char)
{
    $upper = strtoupper($char);
    return ($upper === $char);
}

echo $requestTransformed;

//$s = ($s == strtolower($s)) ? strtoupper($s) : strtolower($s);