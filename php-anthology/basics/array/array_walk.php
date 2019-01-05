<?php

require 'arr.php';

// function test_alter(&$item, $key, $prefix) {
//     $item = $prefix . " : " . $item;
// }

// function test_print($item2, $key, $connector = ' --> ') {
//     echo $key, $connector, $item2, "\n";
// }

// echo "before ...\n";
// array_walk_recursive($fruits, 'test_print');

// array_walk_recursive($fruits, 'test_alter', 'fruit');

// print_r($fruits);
// //

// echo "after ... \n";

// array_walk_recursive($fruits, 'test_print');
//
// print_r($fruits);


$func = function (&$val) {
    $val = $val * $val * $val;
};

// print_r($nums);

// array_walk($nums, $func);

// print_r($nums);

