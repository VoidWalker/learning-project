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
    ['lang' => 'en', 'name' => 'Australia', 'position' => 7]
];
$countriesSorted = [];

function setCriteriaFlags(&$array)
{
    foreach ($array as &$country) {
        ($country['name'] === 'USA') ? $country['is_usa'] = 1 : $country['is_usa'] = 0;
        ($country['lang'] === 'en') ? $country['is_en'] = 1 : $country['is_en'] = 0;

    }
}

function sortByCriteria(&$countries, $criteria)
{
    usort($countries, function ($a, $b) use ($criteria) {
        for ($i = 1; $i < count($criteria); $i++) {
            if ($a[$criteria[$i - 1]] == $b[$criteria[$i - 1]]) {
                if (is_string($a[$criteria[$i]])) {
                    return strcasecmp($a[$criteria[$i]], $b[$criteria[$i]]) ? -1 : 1;
                }
                return ($a[$criteria[$i]] > $b[$criteria[$i]]) ? 1 : -1;
            }
        }
        if (is_string($a[$criteria[0]])) {
            return strcasecmp($a[$criteria[0]], $b[$criteria[0]]) ? -1 : 1;
        }
        return ($a[$criteria[0]] > $b[$criteria[0]]) ? 1 : -1;
    });
}

setCriteriaFlags($countries);
$criteria = ['is_usa', 'is_en', 'position', 'name'];
sortByCriteria($countries, ['name']);
var_dump($countries);