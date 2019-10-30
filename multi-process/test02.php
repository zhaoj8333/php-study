<?php

$pid = pcntl_fork();

switch ($pid) {
    case -1:
        exit("fork failed\n");
        break;
    case 0:
        exit(0);
        break;
    default:
        // pcntl_wait($status);
        pcntl_waitpid($pid, $status, WNOHANG);
        break;
}
