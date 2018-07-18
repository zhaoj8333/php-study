<?php

/**
 * @Author: zhaojun_cd
 * @Date:   2018-07-18 09:21:00
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-07-18 10:08:27
 */

require '../vendor/fzaninotto/faker/src/autoload.php';


// $faker = Faker\Factory::create();

// $faker->seed(1234);
// $faker->dateTime();
// $faker->dateTime('2018-07-18 09:10:10');

// var_dump($faker->name);
// var_dump($faker->dateTime);
//
// $faker->realText(rand(10, 15));
// var_dump($faker->realText());
//
// $faker->realText($faker->numberBetween(10, 20));
// var_dump($faker->realText);
//


// provider
$faker = new Faker\Generator();
$faker->addProvider(new Faker\Provider\zh_CN\Address($faker));
$faker->addProvider(new Faker\Provider\ja_JP\Company($faker));
$faker->addProvider(new Faker\Provider\me_ME\Payment($faker));
$faker->addProvider(new Faker\Provider\hr_HR\Company($faker));
$faker->addProvider(new Faker\Provider\zh_TW\Company($faker));

// var_dump($faker->companyPrefix);

class Book extends \Faker\Provider\Base
{
    public function title($nbWords = 5)
    {
        $title = $this->generator->title($nbWords);
        return substr($title, 0, strlen($title - 1));
    }

    public function ISBN()
    {
        return $this->generator->ean13();
    }
}

$faker->addProvider(new Book($faker));

// $book = new Book($faker);
// var_dump($book->ISBN($faker->title));
// $book->setISBN($faker->ISBN);
// $book->setSummary($faker->text);
// $book->setPrice($faker->randomNumber(2));

// var_dump($faker->title);
