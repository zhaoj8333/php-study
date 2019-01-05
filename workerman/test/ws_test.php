<?php

use Workerman\Worker;

require '../Workerman-master/Autoloader.php';

$wsWorker = new Worker("websocket://0.0.0.0:2000");

$wsWorker->count = 4;

$wsWorker->onMessage = function ($connection, $data) {
    $connection->send('hello' . $data);
};

Worker::runAll();
