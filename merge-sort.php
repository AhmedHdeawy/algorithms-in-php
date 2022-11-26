<?php

$unsorted = [4, 3, 6, 8, 12, 7, 1, 2, 9, 10];
// [1,2,3,4,6,7,8,9,10,12];

function merge(&$array, $left, $mid, $right)
{

    $left_length = $mid - $left + 1;  // Lowest Left Sub Mid = ( floor(0 + 1 / 2) = 0 )
    $right_length = $right - $mid;

    $leftArray = [];
    $rightArray = [];

    for ($i = 0; $i < $left_length; $i++) {
        $leftArray[$i] = $array[$left + $i];
    }

    for ($j = 0; $j < $right_length; $j++) {
        $rightArray[$j] = $array[$mid + 1 + $j];
    }

    $i = $j = 0;
    $k = $left;
    while ($i < $left_length && $j < $right_length) {
        if ($leftArray[$i] <= $rightArray[$j]) {
            $array[$k] = $leftArray[$i];
            $i++;
        } else {
            $array[$k] = $rightArray[$j];
            $j++;
        }
        $k++;
    }

    while ($i < $left_length) {
        $array[$k] = $leftArray[$i];
        $i++;
        $k++;
    }

    while ($j < $right_length) {
        $array[$k] = $rightArray[$j];
        $j++;
        $k++;
    }
}

function mergeSort(&$array, $left, $right)
{
    if ($left >= $right) return;

    $mid = floor(($left + $right) / 2);

    // Left
    mergeSort($array, $left, $mid);

    // Right
    mergeSort($array, $mid + 1, $right);

    merge($array, $left, $mid, $right);
}

function printArray($A)
{
    for ($i = 0; $i < count($A); $i++)
        echo $A[$i] . " ";
    echo "\n";
}

printArray($unsorted);
echo "\n ========== \n";

mergeSort($unsorted, 0, count($unsorted) - 1);

echo "\n ========== \n";
printArray($unsorted);

echo "\n ========== \n";
