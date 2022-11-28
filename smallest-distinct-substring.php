<?php

$s1 = "aabcbcdbca"; // dbca => 4
$s2 = "aaab"; // ab => 2

// Store all unique charachters
function allChars($string) {
    $chars = [];
    for ($i=0; $i < strlen($string); $i++) { 
        if (isset($chars[$string[$i]])) {
            $chars[$string[$i]] += 1;
        } else {
            $chars[$string[$i]] = 1;
        }
    }

    return $chars;
}

function findSmallWindow($string) {

    $uiqueChars = allChars($string);
    $distinctSize = count($uiqueChars);
    $min_length = PHP_INT_MAX;

    for ($i=0; $i < strlen($string); $i++) { 
        $sub_str = "";
        $visited = [];
        $count = 0;
        for ($j=$i; $j < strlen($string); $j++) {

            if (!isset($visited[$string[$j]])) {
                $count++;
                $visited[$string[$j]] = 1;
            } else {
                $visited[$string[$j]] += 1;
            }
            $sub_str .= $string[$j];

            if ($count == $distinctSize) break;
        }

        if (strlen($sub_str) < $min_length && $count == $distinctSize) {
            $min_length = strlen($sub_str);
        }
    }

    return $min_length;

}

echo findSmallWindow($s2);