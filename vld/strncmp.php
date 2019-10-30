<?php

$str = 'qwertypoiuytreza';
$sea = 'qwerty';
$len = strlen($sea);

$begin = microtime(true);

for ($i = 0; $i < 100000; $i ++) {
    $ok = (strncmp($str, 0, $len) === 0);
}

echo microtime(true) - $begin;
