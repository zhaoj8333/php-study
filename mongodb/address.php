<?php

require './vendor/autoload.php';
$mongodb = new MongoDB\Driver\Manager("mongodb://127.0.0.1:27017");
$faker   = Faker\Factory::create('zh_CN');
// while (true) {
    $bulk = new MongoDB\Driver\BulkWrite;
    for ($i = 0; $i < 10; $i++) {
        $value['_id']     = new MongoDB\BSON\ObjectID;
        $value['address'] = $faker->address();

        $bulk->insert($value);
        //var_dump($value);die;
    }
    $write    = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
    $result   = $mongodb->executeBulkWrite('test.address', $bulk, $write);
    var_dump(memory_get_usage() / 1024 / 1024);
    var_dumP($result);
// }


