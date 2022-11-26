<?php

$unsorted = [3,6,2,8,1,9,11,34];

for ($i=1; $i < count($unsorted); $i++) { 
    $key = $unsorted[$i];
    for ($j=$i-1; $j >= 0; $j--) { 
        if ($key < $unsorted[$j]) {
            $unsorted[$j + 1] = $unsorted[$j];
        } else {
            break;
        }
    }
    $unsorted[$j + 1] = $key;
}

var_dump($unsorted);

