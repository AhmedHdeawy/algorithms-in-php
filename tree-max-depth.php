<?php
 
$t1 = [1,2,3,4,-1,-1,-1]; // 3
$t2 = [1,1,1,1];    // 3
$t3 = [3, 9, 20, -1, -1, 15, 71];

function maxDepth(array $tree, int $i) {

    if (empty($tree[$i])) {
        return 0;
    }
    
    if (isset($tree[$i]) && $tree[$i] == -1) {
        return 0;
    }
    
    //  Left (2*i + 1)
    $leftDepth = maxDepth($tree, (2 * $i) + 1);
    // Right (2*i + 2)
    $rightDepth = maxDepth($tree, (2 * $i) + 2);

    return max($leftDepth, $rightDepth) + 1;

    // if ($leftDepth > $rightDepth) {
    //     return $leftDepth + 1;
    // }

    // return $rightDepth + 1;
}

echo maxDepth($t3, 0);