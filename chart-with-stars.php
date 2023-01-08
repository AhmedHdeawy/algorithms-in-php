<?php

$items = [2, 4, 9, 23, 44, 26, 11, 99];

$chart = [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100];

sort($items);

$i = 0;
$j = 1;
$lastItem = 0;

while($j < count($chart)) {

	$count = getElementsInRange($items, $lastItem, $chart[$i], $chart[$j]);
	echo "'" . $chart[$i] ."':" . drawStart($count) . "\n";
	$lastItem =+ $count;
	$i++;
	$j++;

}

function getElementsInRange($items, $start, $min, $max) {
	$count = 0;
	for ($i=$start; $i < count($items); $i++) { 
		if ($items[$i] >= $min && $items[$i] <= $max) {
			$count++;
		}
	}

	return $count;
}

function drawStart($number) {
	$starts = "";
	for ($i=0; $i < $number; $i++) { 
		$starts .= "*";
	}

	return $starts;
}