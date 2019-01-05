<?php

use Workerman\Worker;

require '../Workerman-master/Autoloader.php';

$tcpWorker = new Worker("tcp://0.0.0.0:2347");

$tcpWorker->count = 4;

$tcpWorker->onMessage = function ($connection, $data) {
    $connection->send('hello' . $data);
};

Worker::runAll();
