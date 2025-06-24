<?php

// Search a 2D Matrix

//You are given an m x n integer matrix with the following two properties:
//Each row is sorted in non-decreasing order.
//The first integer of each row is greater than the last integer of the previous row.
//Given an integer target, return true if target is in matrix or false otherwise.
//You must write a solution in O(log(m * n)) time complexity.

/**
 * @param Integer[][] $matrix
 * @param Integer $target
 * @return Boolean
 */
function searchMatrix($matrix, $target): bool {
    $left_line = 0;
    $right_line = count($matrix);
    $n = count($matrix[0]) -1;

    while ($left_line <= $right_line && $left_line < count($matrix)) {
        $mid_line = intdiv($left_line + $right_line,  2);
        $left = 0;
        $right = $n;

        while ($left <= $right) {
            $mid = intdiv($left + $right, 2);

            if ($matrix[$mid_line][$mid] === $target){
                return true;
            }

            if($target > $matrix[$mid_line][$mid]){
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }

        if ($target > $matrix[$mid_line][0]){
            $left_line = $mid_line + 1;
        }

        if ($target < $matrix[$mid_line][$n]) {
            $right_line = $mid_line - 1;
        }

    }

    return false;
}

echo searchMatrix([[1,3,5,7],[10,11,16,20],[23,30,34,60]], 3);
echo searchMatrix([[1,3,5,7],[10,11,16,20],[23,30,34,60]], 13);
exit;