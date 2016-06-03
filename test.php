<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$countries = [
    ['lang' => 'en', 'name' => 'USA', 'position' => 5],
    ['lang' => 'nl', 'name' => 'Netherlands', 'position' => 3],
    ['lang' => 'de', 'name' => 'Deutchland', 'position' => 8],
    ['lang' => 'fr', 'name' => 'France', 'position' => 10],
    ['lang' => 'pl', 'name' => 'Poland', 'position' => 2],
    ['lang' => 'it', 'name' => 'Italy', 'position' => 5],
    ['lang' => 'en', 'name' => 'Canada', 'position' => 6],
    ['lang' => 'en', 'name' => 'Australia', 'position' => 1]
];
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

function extractEnglish(&$array)
{
    $arrayEn = [];
    foreach ($array as $index => $country) {
        if ($country['lang'] === 'en') {
            $arrayEn[] = $country;
            unset($array[$index]);
        }
    }

    return $arrayEn;
}

function sortByPosition($countryArray)
{
    $array = $countryArray;
    $sortingFlag = true;
    $length = count($array);
    while ($sortingFlag) {
        $sortingFlag = false;
        for ($i = 0; $i < $length - 1; $i++) {
            if ($array[$i]['position'] > $array[$i + 1]['position']) {
                $currentElement = $array[$i];
                $array[$i] = $array[$i + 1];
                $array[$i + 1] = $currentElement;
                $sortingFlag = true;
            }
        }
    }

    return $array;
}

function sortByName()
{

}

$countriesSorted[] = extractUSA($countries);

$countriesEn = sortByPosition(extractEnglish($countries));
$countriesSorted = array_merge($countriesSorted, $countriesEn);

var_dump($countriesSorted);


