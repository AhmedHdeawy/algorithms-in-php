<?php

// $x = [1,2,3,9];
$x = [1,2,4,4];
$sum = 8;

function hasPairToSum($x, $sum) {
	$comp = [];
	for ($i=0; $i < count($x); $i++) { 
		if (isset($comp[$x[$i]])) {
			return true;
		}

		$comp[$x[$i]] = true;
	}
	return false;
}

echo hasPairToSum($x, $sum) ? "F" : "N";



// $i = 0;
// $j = count($x) - 1;

// while ($i < $j) {
// 	if (($x[$i] + $x[$j]) > $sum) {
// 		$j--;
// 	} elseif (($x[$i] + $x[$j]) < $sum) {
// 		$i++;
// 	} else {
// 		echo $x[$i] . " : " . $x[$j];
// 		break;
// 	}
// }