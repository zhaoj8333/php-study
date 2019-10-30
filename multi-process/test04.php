#!/usr/local/php72/bin/php
<?php

$pid = pcntl_fork();

if ($pid == -1) {
    exit('fork failed');
} elseif ($pid) {
    $id = getmypid();
    echo "parent process pid {$id}, child pid {$pid}\n";

    while (1) {
        $res = pcntl_wait($status, WNOHANG);
        if ($res == -1 || $res > 0) {
            sleep(10);
            break;
        }
    }

} else {
    $id = getmypid();
    echo "child process, pid {$id}\n";
    sleep(2);
}

