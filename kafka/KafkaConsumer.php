<?php

$rcf = new Rdkafka\Conf();
$rcf->set('group.id', 'test');

$cf = new Rdkafka\TopicConf();
$cf->set('auto.offset.reset', 'smallest');
$cf->set('auto.commit.enable', true);

$rk = new Rdkafka\Consumer($rcf);
$rk->setLogLevel(LOG_DEBUG);
$rk->addBrokers('127.0.0.1');

$topic = $rk->newTopic('test', $cf);

while (true) {
    $topic->consumeStart(0, RD_KAFKA_OFFSET_STORED);
    $msg = $topic->consume(0, 1000);
    var_dump($msg);

    if ($msg->err) {
        echo $msg->errstr();
        break;
    } else {
        echo $msg->payload;
    }
    $topic->consumeStop(0);
}