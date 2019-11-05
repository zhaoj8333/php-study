#!/usr/local/php72/bin/php
<?php

echo sprintf("内存填充前占用: %.2fMB\n", memory_get_usage() / 1024 / 1024);

$mem = fopen("php://memory", 'r+');

// var_dump($mem);
for ($i = 0; $i < 10000; $i++) {
    fwrite($mem, str_repeat('memory', 1000));
}

echo sprintf("内存填充后占用: %.2fMB\n", memory_get_usage() / 1024 / 1024);

fclose($mem);

echo sprintf("内存释放后占用: %.2fMB\n", memory_get_usage() / 1024 / 1024);
