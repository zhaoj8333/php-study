<?php

// $file = 'small.log';
$file = 'big.log';


$fileSize = filesize($file);

$start = microtime(true);

// $count = 100000;
$count = 10000;

for ($i = 0; $i < $count; $i++) {
    $handle = fopen($file, 'r');
    $content = fread($handle, $fileSize); // small : 0.56
    // $content = fread($handle, filesize($file)); // small : 0.66
    fclose($handle);
}

echo (microtime(true) - $start) . "\n"; // small : 0.66

// big : 0.0026