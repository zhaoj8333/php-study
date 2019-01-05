<?php

require 'arr.php';

function cube($n) {
    return $n * $n * $n;
}

// $b = array_map('cube', $nums);

// print_r($nums);

// print_r($b);
//

$func = function ($val) {
    return $val * $val * $val;
};

// var_dump($func);

print_r($nums);
print_r(array_map($func, $nums));