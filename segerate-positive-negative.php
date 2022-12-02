<?php

function segregate(&$array, $start, $end) {

    if ($start >= $end) return;

    $mid = floor(($start + $end) / 2);

    segregate($array, $start, $mid);
    segregate($array, $mid + 1, $end);

    merge($array, $start, $mid, $end);
}

function merge(&$array, $start, $mid, $end) {

    $leftLength = $mid - $start + 1;
    $rightLength = $end - $mid;

    $left_array = $right_array = [];
    for ($i=0; $i < $leftLength; $i++) { 
        $left_array[$i] = $array[$start + $i];
    }

    for ($j=0; $j < $rightLength; $j++) { 
        $right_array[$j] = $array[$mid + 1 + $j];
    }

    $i = $j = 0;
    $k = $start;

    // Negative in Left Array
    while ($i < $leftLength && $left_array[$i] <= 0) {
        $array[$k] = $left_array[$i];
        $i++; $k++;
    }

    // Negative in Right Array
    while ($j < $rightLength && $right_array[$j] <= 0) {
        $array[$k] = $right_array[$j];
        $j++;
        $k++;
    }

    while ($i < $leftLength) {
        $array[$k] = $left_array[$i];
        $i++;
        $k++;
    }

    while ($j < $rightLength) {
        $array[$k] = $right_array[$j];
        $j++;
        $k++;
    }

}

$array = [1, -5, 3, -2, -6, 6, 8, -9, -11];

echo implode(",", $array) . "\n" . "\n";

segregate($array, 0, count($array) - 1);

echo implode(",", $array) . "\n";