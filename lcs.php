<?php

// Longest Common Subsequence

$text = "HELLOWORLD";

$sub = "OHELOD";

$text = " " . $text;
$sub = " " . $sub;

$text = str_split($text);
$sub = str_split($sub);


$textLen = count($text);
$subLen = count($sub);
$dp = [];


for ($i=0; $i < $subLen; $i++) { 
	
	for ($j=0; $j < $textLen; $j++) { 
		
		if ($i == 0 || $j == 0) {
			$dp[$i][$j] = 0;
		} 
		elseif ( $sub[$i] == $text[$j] ) {
			$dp[$i][$j] = 1 + $dp[$i - 1][$j - 1];
		} 
		else {
			$dp[$i][$j] = max($dp[$i - 1][$j], $dp[$i][$j - 1]);
		}
	}
}

$i = $subLen - 1;
$j = $textLen - 1;
$str = "";

while ($i > 0 && $j > 0) {

	if ($dp[$i][$j] > $dp[$i][$j - 1]) {
	
		if ($dp[$i][$j] == $dp[$i - 1][$j]) {
			$i--;
		} else {
			$str = $sub[$i] . $str;
			$i--;
			$j--;
		}

	} else {
		$j--;
	}

}


echo $str;




