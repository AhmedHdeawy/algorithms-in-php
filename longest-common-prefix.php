<?php
class Solution
{

    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs)
    {

        if (count($strs) == 1) return $strs[0];

        $prefix = "";
        $lonPrefix = "";

        for ($i = 0; $i < strlen($strs[0]); $i++) {
            $check = true;
            $prefix = $strs[0][$i];
            $count = 1;

            for ($j = 1; $j < count($strs); $j++) {
                if (!isset($strs[$j][$i]) || $strs[$j][$i] != $prefix) {
                    $check = false;
                    break;
                }
                $count++;
            }

            if ($check && $count == count($strs)) {
                $lonPrefix .= $prefix;
            } else {
                break;
            }
        }

        return $lonPrefix;
    }
}

$s1 = ["flower", "flow", "floight"];
$s2 = ["dog", "racecar", "car"];

$sol = new Solution();
echo $sol->longestCommonPrefix($s1) . "\n";