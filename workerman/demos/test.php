<?php

use Workerman\Worker;

require_once __DIR__ . '/../Workerman-master/Autoloader.php';

$httpWorker = new Worker('http://0.0.0.0:2345');

$httpWorker->count = 5;

$httpWorker->onMessage = function($connection, $data) {
    $msg = 'hello, wrold';
    $connection->send($msg);
};

Worker::runAll();
