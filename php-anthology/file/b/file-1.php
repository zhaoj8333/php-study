<?php

$file = "./test.ini";

if (is_file($file)) {
    while (true) {
        $handle = fopen($file, 'w');
        sleep(1);
        var_dump($handle);
        unset($handle);
    }
} else {
    touch($file);
}


