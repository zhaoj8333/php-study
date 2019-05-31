<?php

// $file = 'small.log';
$file = 'big.log';

$start = microtime(true);

// $count = 100000;
$count = 10000;

for ($i = 0; $i < $count; $i++) {
    $content = file_get_contents($file);
}
echo (microtime(true) - $start) . "\n"; // small:  1.47

// big: 0.002