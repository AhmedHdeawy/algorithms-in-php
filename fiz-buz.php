<?php

for ($i=1; $i <= 100; $i++) {

    if ($i % 3 == 0 && $i % 5 == 0) {
        echo "FizzBuzz {$i} \n";
    } elseif ($i % 3 == 0) {
        echo "Fizz {$i} \n";
    } elseif ($i % 5 == 0) {
        echo "Buzz {$i} \n";
    } else {
        echo "{$i} \n";
    }
}