<?php

/**
 * @Author: zhaojun_cd
 * @Date:   2018-07-17 14:22:50
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-07-18 10:18:23
 */

require '../vendor/fzaninotto/faker/src/autoload.php';

// $faker = Faker\Factory::create();
$faker = Faker\Factory::create('zh_CN');

// var_dump($faker);

// for ($i = 0; $i < 10; $i++) {
//     var_dump($faker->name);
//     var_dump($faker->address);
//     var_dump($faker->text);
// }

$values = [];

for ($i = 0; $i < 5; $i++) {
    // $values[] = $faker->unique()->randomDigitNotNull;
    // $values[] = $faker->unique()->randomNumber;
    // $values[] = $faker->unique()->randomFloat();
    // $values[] = $faker->unique()->numberBetween(10, 100);
    // $values[] = $faker->unique()->randomLetter;
    //
    // $values[] = $faker->unique()->randomElement(['a', 'b', 'c', 'd', 'e', 'f', 'h', 'i'], 3);
    // $values[] = $faker->unique()->randomElements(['a', 'b', 'c', 'd', 'e', 'f', 'h', 'i'], 3);

    // $values[] = $faker->unique()->shuffle('hello, world');
    // $values[] = $faker->shuffle([1, 2, 3]);
    // $values[] = $faker->unique()->numerify();
    // $values[] = $faker->unique()->lexify('hello ???');
    // $values[] = $faker->unique()->bothify('hello ###???');
    // $values[] = $faker->unique()->asciify('hello ******');
    // $values[] = $faker->unique() ->regexify('[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}');

    // $values[] = $faker->unique()->words(1, true);
    // $values[] = $faker->unique()->sentences();
    // $values[] = $faker->unique()->paragraphs();
    // $values[] = $faker->unique()->text();
    //

    // $values[] = $faker->unique()->name('female');
    // $values[] = $faker->unique()->suffix();
    // $values[] = $faker->unique()->lastName();

    // $values[] = $faker->unique()->cityPrefix();
    // $values[] = $faker->unique()->secondaryAddress();
    // $values[] = $faker->unique()->state();
    // $values[] = $faker->unique()->buildingNumber();
    // $values[] = $faker->unique()->streetAddress();
    // $values[] = $faker->unique()->latitude();
    //
    //
    // $values[] = $faker->unique()->phoneNumber();
    // $values[] = $faker->unique()->tollFreePhoneNumber();
    // $values[] = $faker->unique()->e164PhoneNumber();
    //
    // $values[] = $faker->unique()->catchPhrase();
    // $values[] = $faker->bs();
    // $values[] = $faker->unique()->companySuffix();
    // $values[] = $faker->unique()->jobTitle();
    //

    // $values[] = $faker->unique()->realText();
    //
    //
    // $values[] = $faker->unique()->unixTime();
    //
    // $values[] = $faker->unique()->email();

    // $values[] = $faker->unique()->chrome();
    //
    // $values[] = $faker->unique()->creditCardType();
    //
    // $values[] = $faker->unique()->hexcolor();

    // $values[] = $faker->unique()->fileExtension();
    //
    // $values[] = $faker->unique()->imageUrl();
    //
    // $values[] = $faker->unique()->uuid();
    // $values[] = $faker->unique()->ean8();
    // $values[] = $faker->unique()->md5();
    // $values[] = $faker->unique()->biasedNumberBetween();
    // $values[] = $faker->unique()->randomHtml();
    // $values[] = $faker->unique()->company();
    // $values[] = $faker->passthrough(mt_rand(5, 15));
    //
    // $values[] = $faker->unique()->name();


//

}
print_r($values);