<?php


require './vendor/autoload.php';


function get_data()
{
    $faker = Faker\Factory::create('zh_CN');
    for ($i = 0; $i < 100; $i++) {
        $values[$i]['id'] = $faker->unique()->uuid();
        $values[$i]['company'] = $faker->unique()->company();
        $values[$i]['name'] = $faker->unique()->name();
        $values[$i]['phone'] = $faker->unique()->phoneNumber();
        $values[$i]['email'] = $faker->unique()->email();
        $values[$i]['title'] = $faker->unique()->jobTitle();
    }
    return $values;
}


$data = get_data();

$mongodb = new MongoDB\Driver\Manager("mongodb://127.0.0.1:27017");
$bulk    = new MongoDB\Driver\BulkWrite;

$write =
