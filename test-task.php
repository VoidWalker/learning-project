<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$countries = [
    ['lang' => 'en', 'name' => 'USA', 'position' => 5],
    ['lang' => 'nl', 'name' => 'Netherlands', 'position' => 3],
    ['lang' => 'de', 'name' => 'Germany', 'position' => 8],
    ['lang' => 'de', 'name' => 'Garmany', 'position' => 8],
    ['lang' => 'fr', 'name' => 'France', 'position' => 10],
    ['lang' => 'pl', 'name' => 'Poland', 'position' => 2],
    ['lang' => 'it', 'name' => 'Italy', 'position' => 5],
    ['lang' => 'en', 'name' => 'Canada', 'position' => 6],
    ['lang' => 'en', 'name' => 'Australia', 'position' => 7],
    ['lang' => 'en', 'name' => 'Abstralia', 'position' => 7]
];
//var_dump($countries);
$countriesSorted = [];

function extractUSA(&$array)
{
    $USA = '';
    foreach ($array as $index => $country) {
        if ($country['name'] === 'USA') {
            $USA = $country;
            unset($array[$index]);
        }
    }

    return $USA;
}

function extractEnglish($array)
{
    $arrayEn = [];
    foreach ($array as $index => $country) {
        if ($country['lang'] === 'en') {
            $arrayEn[] = $country;
        }
    }

    return $arrayEn;
}

function extractNonEnglish($array)
{
    $arrayOther = [];
    foreach ($array as $index => $country) {
        if ($country['lang'] !== 'en') {
            $arrayOther[] = $country;
        }
    }

    return $arrayOther;
}

function sortArray($countryArray)
{
    $array = $countryArray;
    $sortingFlag = true;
    $length = count($array);
    while ($sortingFlag) {
        $sortingFlag = false;
        for ($i = 0; $i < $length - 1; $i++) {
            if ($array[$i]['name'] == 'USA') {
                $currentElement = $array[$i];
                $array[$i] = $array[$i + 1];
                $array[$i + 1] = $currentElement;
                $sortingFlag = true;
            } elseif ($array[$i]['position'] > $array[$i + 1]['position']) {
                $currentElement = $array[$i];
                $array[$i] = $array[$i + 1];
                $array[$i + 1] = $currentElement;
                $sortingFlag = true;
            } elseif (($array[$i]['position'] === $array[$i + 1]['position']) && ($array[$i]['name'] > $array[$i + 1]['name'])) {
                $currentElement = $array[$i];
                $array[$i] = $array[$i + 1];
                $array[$i + 1] = $currentElement;
                $sortingFlag = true;
            }
        }
    }

    return $array;
}

function sortByName($countryArray)
{
    $array = $countryArray;
    $sortingFlag = true;
    $length = count($array);
    while ($sortingFlag) {
        $sortingFlag = false;
        for ($i = 0; $i < $length - 1; $i++) {
            if ($array[$i]['name'] > $array[$i + 1]['name']) {
                $currentElement = $array[$i];
                $array[$i] = $array[$i + 1];
                $array[$i + 1] = $currentElement;
                $sortingFlag = true;
            }
        }
    }

    return $array;
}

$countriesSorted[] = extractUSA($countries);
$countriesEn = sortArray(extractEnglish($countries));
$countriesSorted = array_merge($countriesSorted, $countriesEn);
$countriesOther = sortArray(extractNonEnglish($countries));
$countriesSorted = array_merge($countriesSorted, $countriesOther);

var_dump($countriesSorted);


