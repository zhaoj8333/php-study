<?php

/**
 * @Author: zhaojun
 * @Date:   2018-05-19 11:19:16
 * @Last Modified by:   zhaojun
 * @Last Modified time: 2018-05-21 10:10:24
 */

require 'kafkaconf.php';

$producer = new RdKafka\Producer();

$producer->setLogLevel(LOG_DEBUG);

try {
    $producer->addBrokers($conf['host'] . ':' . $conf['port']);
    $topic = $producer->newTopic($conf['topic']);
    while (true) {
        $message = 'php-kafka-test: ' . uniqid() . date('Y-m-d H:i:s');
        $result = $topic->produce(0, 0, $message);
        echo $message, "\n";
        sleep(1);
    }
} catch (Exception $e) {
    throw new Exception($e->getMessage());
}


