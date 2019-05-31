<?php

require './vendor/autoload.php';
$mongodb = new MongoDB\Driver\Manager("mongodb://127.0.0.1:27017");
$faker   = Faker\Factory::create('zh_CN');
$query   = new MongoDB\Driver\Query([]);

$users = [];
$cursor = $mongodb->executeQuery('test.user', $query);

foreach ($cursor as $doc) {
     // var_dump($doc);
    $ref = new ReflectionClass($doc);
}


