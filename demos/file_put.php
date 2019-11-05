<?php

$file = "/home/zhaojun/Desktop/err.log";
$handle = fopen($file, 'w+');

for ($i = 0; $i <= 1000; $i++) {
    fwrite($handle, $i);
    fwrite($handle, PHP_EOL);
}

fclose($handle);

