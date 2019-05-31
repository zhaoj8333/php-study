<?php

$count = 100000;
$arr = array_fill(0, $count, '1234567890');

$start = microtime();
reset($arr);

$i = 0;
while ($i < $count) {
    $x = $arr[$i];
    $i ++;
}

echo "while: ", (microtime() - $start) , "--- \n"; // 0.012746