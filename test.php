<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$countries = [
    ['lang' => 'nl', 'name' => 'Netherlands', 'position' => 3],
    ['lang' => 'en', 'name' => 'USA', 'position' => 15],
    ['lang' => 'de', 'name' => 'Germany', 'position' => 8],
    ['lang' => 'de', 'name' => 'Garmany', 'position' => 8],
    ['lang' => 'fr', 'name' => 'France', 'position' => 10],
    ['lang' => 'pl', 'name' => 'Poland', 'position' => 2],
    ['lang' => 'it', 'name' => 'Italy', 'position' => 5],
    ['lang' => 'en', 'name' => 'Canada', 'position' => 6],
    ['lang' => 'en', 'name' => 'Abstralia', 'position' => 7],
    ['lang' => 'en', 'name' => 'Australia', 'position' => 7]
];
$criteria = ['position', 'name'];
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

function sortByCriteria(&$countries, $criteria)
{
    usort($countries, function ($a, $b) use ($criteria) {
        for ($i = 1; $i < count($criteria); $i++) {
            if ($a[$criteria[$i - 1]] == $b[$criteria[$i - 1]]) {
                return ($a[$criteria[$i]] < $b[$criteria[$i]]) ? -1 : 1;
            }
        }
        return ($a[$criteria[0]] < $b[$criteria[0]]) ? -1 : 1;
    });
}

$countriesSorted[] = extractUSA($countries);
$countriesEn = extractEnglish($countries);
sortByCriteria($countriesEn, $criteria);
$countriesSorted = array_merge($countriesSorted, $countriesEn);
$countriesOther = extractNonEnglish($countries);
sortByCriteria($countriesOther, $criteria);
$countriesSorted = array_merge($countriesSorted, $countriesOther);
var_dump($countriesSorted);


