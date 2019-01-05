<?php

use Workerman\Worker;

require '../Workerman-master/Autoloader.php';

$httpWorker = new Worker('http://0.0.0.0:2345');

$httpWorker->count = 4;

$httpWorker->onMessage = function ($connection, $data) {
    $connection->send('hello world');
};

Worker::runAll();
