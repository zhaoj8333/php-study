<?php

$str = 'qwertypoiuytrez';
$sea = 'qwerty';

$len = strlen($sea);

$begin = microtime(true);

for ($i = 0; $i < 100000; $i ++) {
    $ok = (substr($str, 0, $len) === $sea);
}

echo microtime(true) - $begin;
