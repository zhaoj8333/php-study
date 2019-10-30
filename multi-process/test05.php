#!/usr/local/php72/bin/php
<?php

$child_pids = [];

for ($i = 0; $i < 3; $i++) {
    $pid = pcntl_fork();
    if ($pid == -1) {
        exit("fork failed\n");
    } elseif ($pid) {
        $child_pids[] = $pid;
        $id = getmypid();
        echo time() . " Parent, pid {$pid}, child pid {$pid}\n";
    } else {
        $id = getmypid();
        $rand = rand(1, 3);
        echo time() . " Child, pid {$id}, sleep $rand\n";
        sleep($rand);
        exit(); // 防止子进程进入for循环
    }
}
