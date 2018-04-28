<?php

$count = 100000;
$arr = array_fill(0, $count, '1234567890');

$start = microtime();
reset($arr);

$i = 0;
for ($i = 0; $i < $count; $i++) {
    $x = $arr[$i];
    $i ++;
}

echo "for: " , (microtime() - $start) , "--- \n"; // 0.012731
