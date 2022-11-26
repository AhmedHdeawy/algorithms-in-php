<?php

$x = $y = $a = $b = [];
$ab = $a2 = $b2 = $mx = $my = 0;
$n = (int) readline("N? ");

// Get Mean
for($i = 0; $i < $n; $i++) {

  $xr = readline("X #{$i} ");
  $x[$i] = $xr;
  $mx += $xr;

  $yr = readline("Y #{$i} ");
  $y[$i] = $yr;
  $my += $yr;
}

$mx = $mx / $n;
$my = $my / $n;

for ($i = 0; $i < $n; $i++) {

    $a[$i] = $x[$i] - $mx;
    $b[$i] = $y[$i] - $my;
    $ab += round($a[$i] * $b[$i]);
    $a2 += round(abs($a[$i] * $a[$i]));
    $b2 += round(abs(pow($b[$i], 2)));
}

echo "=============" . "\n";

echo $mx . "\n";
echo $my . "\n";
echo $ab . "\n";
echo $a2 . "\n";
echo $b2 . "\n";

echo "=============" . "\n";

echo ( $ab / sqrt( ($a2 * $b2)) ) . "\n";
