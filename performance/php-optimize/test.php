<?php

function call_many() {
    $arr = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

    $start = microtime();

    for ($i = 0; $i < 100000; $i++) {
        for ($j = 0; $j < count($arr); $j++) {
            $j = 100381 * $j;
        }
    }

    echo microtime() - $start, "\n";

}

function call_once() {
    $arr = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

    $start = microtime();
    $count = count($arr);
    for ($i = 0; $i < 100000; $i++) {
        for ($j = 0; $j < $count; $j++) {
            $j = 100381 * $j;
        }
    }

    echo microtime() - $start, "\n";

}

// call_many(); // 0.17112
// call_once(); // 0.036844