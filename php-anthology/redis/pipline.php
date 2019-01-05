<?php

/**
 * @Author: zhaojun
 * @Date:   2018-08-06 11:48:14
 * @Last Modified by:   zhaojun
 * @Last Modified time: 2018-08-06 11:53:23
 */

$redis = new Redis();
$redis->connect('172.17.0.2', 6379, 2);

$pipe = $redis->multi(Redis::PIPELINE);

for ($i=0; $i < 10; $i++) {
    $key = "key::{$i}";
    $val = str_pad($i, 2, "0", 0);
    print_r($pipe->set($key, $val));
}

$result = $pipe->exec();

print_r($result);