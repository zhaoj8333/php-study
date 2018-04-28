<?php

$count = 100000;
$arr = array_fill(0, $count, '1234567890');

$start = microtime();
reset($arr);

foreach ($arr as $key => $item) {
    $x = $item;
}

echo "foreach: ", (microtime() - $start) , "--- \n"; // 0.009896