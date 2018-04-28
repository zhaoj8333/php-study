<?php

$kafkaConf = new RdKafka\Conf();
$kafkaConf->set('group.id', 'test');

$kafkaTopic = new RdKafka\TopicConf();
$kafkaTopic->set('offset.store.method', 'broker');
$kafkaTopic->set('auto.offset.reset', 'smallest');

$kafkaProduce = new RdKafka\Producer($kafkaConf);
$kafkaProduce->setLogLevel(LOG_DEBUG);

$kafkaProduce->addBrokers('127.0.0.1');
$topic = $kafkaProduce->newTopic('test', $kafkaTopic);

for ($i = 0; $i < 1000; $i++) {
    $topic->produce(0, 0, 'test', $i);
}
