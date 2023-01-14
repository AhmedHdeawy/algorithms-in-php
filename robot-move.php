<?php

$move = "UDDLRL";
$init = [0, 0];	// x, y

// U => y, D => y, R => x, L => x

for ($i=0; $i < strlen($move); $i++) { 
	switch ($move[$i]) {
		case 'U':
			$init[1] += 1;
			break;
		case 'D':
			$init[1] -= 1;
			break;
		case 'R':
			$init[0] += 1;
			break;
		case 'L':
			$init[0] -= 1;
			break;
		default:
			// code...
			break;
	}
}

echo "(" . $init[0] . ", " . $init[1] . ")";