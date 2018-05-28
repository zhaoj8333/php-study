<?php

// $conf = new RdKafka\Conf();

// var_export(get_class_methods('RdKafka\Conf'));

// array (
//   0 => '__construct',
//   1 => 'dump',
//   2 => 'set',
//   3 => 'setDefaultTopicConf',
//   4 => 'setErrorCb',
//   5 => 'setDrMsgCb',
//   6 => 'setStatsCb',
//   7 => 'setRebalanceCb',
//   8 => 'setConsumeCb',
//   9 => 'setOffsetCommitCb',
//(' );
//

$conf = [
    'host' => '172.17.0.2',
    'port' => 9092,
    'topic' => 'kafka-php-test',
];