<?php

require './vendor/autoload.php';
$mongodb = new MongoDB\Driver\Manager("mongodb://127.0.0.1:27017");
$faker   = Faker\Factory::create('zh_CN');
$query   = new MongoDB\Driver\Query([]);
$addresses = [];
$cursor = $mongodb->executeQuery('test.address', $query);
foreach ($cursor as $doc) {
    // var_dump($doc);
    $addresses[] = // [
        //"id"      => 
        $doc->_id->__toString();
        // "address" => $doc->address,
        // $doc->address;
    // ];
}
while (true) {
    $bulk = new MongoDB\Driver\BulkWrite;
    for ($i = 0; $i < 50; $i++) {
        $value['_id']     = new MongoDB\BSON\ObjectID;
        $value['company'] = $faker->company();
        $value['name']    = $faker->name();
        $value['phone']   = $faker->phoneNumber();
        $value['email']   = $faker->email();
        $value['title']   = $faker->jobTitle();
        $value['address'] = [
            [
                '$ref' => 'address',
                '$id'  => $addresses[array_rand($addresses)],
                '$db'  => 'test',
            ], [
                '$ref' => 'address',
                '$id'  => $addresses[array_rand($addresses)],
                '$db'  => 'test',
            ]   
        ];
        $value['type']    = $faker->randomDigitNotNull();
        $value['likes']   = rand(10, 10000);
        $value['birth']   = $faker->date();
        $value['text']    = $faker->realText();
        $value['agent']   = $faker->userAgent();
        $value['color']   = $faker->hexcolor();

        $bulk->insert($value);
        // var_dump($value);die;
    }
    $write    = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
    $result   = $mongodb->executeBulkWrite('test.user', $bulk, $write);
    var_dump(memory_get_usage() / 1024 / 1024);
    var_dumP($result);
}


