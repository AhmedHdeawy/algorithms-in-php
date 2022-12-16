<?php

// Breadth First Search


$graph = [
	'A'	=>	['B', 'C'],
	'B'	=>	['E', 'D', 'A'],
	'C'	=>	['D', 'F', 'A'],
	'D'	=>	['E', 'F', 'B'],
	'E'	=>	['F', 'B'],
	'F'	=>	['D', 'E', 'C', 'H'],
	'G'	=>	['H', 'I'],
	'H'	=>	['G', 'I', 'F'],
	'I'	=>	['G', 'H'],
];

$queue = new \DS\Queue();
$visited = [];

$queue->push("A");
array_push($visited, 'A');


while ($queue->isEmpty() === false) {
	
	$current_vertix = $queue->pop();
	$next_verticies = $graph[$current_vertix];

	for ($i=0; $i < count($next_verticies); $i++) { 
		
		if (!in_array($next_verticies[$i], $visited)) {
			$queue->push($next_verticies[$i]);
			array_push($visited, $next_verticies[$i]);

			echo $current_vertix . " => " . $next_verticies[$i] . "\n"; 
		}

	}

}


