<?php

function binarySearch($array, $value) {
    $low = 0;
    $high = count($array) - 1;

    while ($low <= $high) {
        
        $mid = floor(($high + $low) / 2);

        if ($value == $array[$mid]) {
            return $mid;
        }

        if ($value > $array[$mid]) {
            $low = $mid + 1;
        } else {
            $high = $mid - 1;
        }
    }

    return -1;
}

$array = [1,3,5,6,7,10,13,15,22,34,56,122];

echo binarySearch($array, 56) . "\n";