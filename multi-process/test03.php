#!/usr/local/php72/bin/php
<?php

$pid = pcntl_fork();

if ($pid == -1) {
    die("could not fork\n");
} elseif ($pid) {
    $id = getmypid();
    echo "parent pid {$id}, child pid {$pid}\n";
    sleep(5);
    // pcntl_wait($status);
    // $wait = pcntl_waitpid($pid, $status, WNOHANG);
    $wait = pcntl_waitpid($pid, $status);
    var_dump($wait);
    echo "parent end\n";
} else {
    $id = getmypid();
    echo "child pid {$id}\n";
    sleep(10);
    echo "child end\n";
}

