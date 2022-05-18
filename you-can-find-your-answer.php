<?php

$str = '5+5/2*3';
preg_match_all('!\d+!', $str, $nums);
preg_match_all('!\D+!', $str, $operators);

$operators = $operators[0];
$nums = $nums[0];

$result = 0;
foreach ($operators as $key => $operator) {
    if ($key === 0) {
        $result = $nums[$key];
    }

    switch ($operator) {
        case '+':
            $result += $nums[$key + 1];
            break;
        case '-':
            $result -= $nums[$key + 1];
            break;
        case '*':
            if ($result == 0) {
                $result = 1;
            }
            $result *= $nums[$key + 1];
            break;
        case '/':
            if ($result == 0) {
                $result = 1;
            }
            $result /= $nums[$key + 1];
            break;
    }
}

echo $result;

// this misses some of the task part, but contains the essencial solution!