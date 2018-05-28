<?php

/**
 * @Author: zhaojun
 * @Date:   2018-05-19 11:18:57
 * @Last Modified by:   zhaojun
 * @Last Modified time: 2018-05-21 09:53:02
 */

require 'kafkaconf.php';

$rk = new RdKafka\Consumer();

$rk->setLogLevel(LOG_DEBUG);
$rk->addBrokers($conf['host'] . ':' . $conf['port']);

$topic = $rk->newTopic($conf['topic']);
$topic->consumeStart(0, RD_KAFKA_OFFSET_BEGINNING);

while (true) {
    $msg = $topic->consume(0, 1000);
    if ($msg == null) {
        continue;
    }
    if ($msg->err) {
            echo 'error: ', $msg->errstr(), "\n";
    } else {
        echo $msg->payload, "\n";
    }

}