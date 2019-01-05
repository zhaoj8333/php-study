<?php

/**
 * @Author: zhaojun_cd
 * @Date:   2018-07-18 10:15:19
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-07-18 10:20:58
 */


require '../vendor/fzaninotto/faker/src/autoload.php';
$faker = Faker\Factory::create('at_AT');

$values = [];

for ($i = 0; $i < 5; $i++) {
    // $values = $faker->idNumber();
    // $values = $faker->nationalIdNumber();
    // $values = $faker->foreignerIdNumber();
    // $values = $faker->companyIdNumber();
    // $values = $faker->bankAccountNumber();
    $values = $faker->vat;
}

var_dump($values);
