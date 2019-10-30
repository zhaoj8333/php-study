#!/usr/local/php72/bin/php
<?php

// pcntl:
// process control

// pcntl_fork: 创建与当前进程一样的子进程,但拥有自己的数据段
$pid = pcntl_fork();
// pcntl_fork调用成功后，一个程序变成两个程序，

if ($pid > 0) {
    // parent process
    $parentPid = getmypid();
    echo "parent, pid is $parentPid\n";
    echo "forked pid is $pid\n";
    // sleep(5);
} elseif ($pid == 0) {
    // child process
    $childPid = getmypid();
    echo "child, pid is $childPid\n";
    echo "forked pid is $pid\n";
    sleep(10);
} else {
    // failed
    echo "fork faied\n";
    exit(-1);
}
