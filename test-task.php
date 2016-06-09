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
    ['lang' => 'en', 'name' => 'Canada', 'position' => 6],
    ['lang' => 'it', 'name' => 'Italy', 'position' => 5],
    ['lang' => 'en', 'name' => 'Abstralia', 'position' => 7],
    ['lang' => 'en', 'name' => 'Abstralia', 'position' => 7],
    ['lang' => 'en', 'name' => 'Australia', 'position' => 7]
];

/**
 * @param array $countries
 * @return array
 */
function setPriorityFlags(array $countries)
{
    $array = $countries;
    foreach ($array as &$country) {
        ($country['name'] === 'USA') ? $country['is_usa'] = 0 : $country['is_usa'] = 1;
        ($country['lang'] === 'en') ? $country['is_en'] = 0 : $country['is_en'] = 1;
    }

    return $array;
}

/**
 * @param array $countriesIn
 * @param $criteria
 * @return array
 */
function sortByCriteria(array $countriesIn, $criteria)
{
    $countries = $countriesIn;
    usort($countries, function ($a, $b) use ($criteria) {
        for ($i = 0; $i < count($criteria); $i++) {
            if ($a[$criteria[$i]] == $b[$criteria[$i]]) {
                continue;
            }
            return ($a[$criteria[$i]] > $b[$criteria[$i]]) ? 1 : -1;
        }
        return 0;
    });

    return $countries;
}

$countriesWithFlags = setPriorityFlags($countries);
$countriesSorted = sortByCriteria($countriesWithFlags, ['is_usa', 'is_en', 'position', 'name']);
var_dump($countriesSorted);