<?php

/**
 * @Author: zhaojun_cd
 * @Date:   2018-07-17 15:22:44
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-07-18 09:20:49
 */


// orm odm

require '../vendor/fzaninotto/faker/src/autoload.php';

$generator = \Faker\Factory::create();
// print_r($generator);
$populator = new \Faker\ORM\Propel\Populator($generator);

class Author extends \Faker\ORM\Propel\EntityPopulator
{
    const PEER = 'Author';

    public function getTableMap()
    {
        return new self('a');
    }

    public function getColumns()
    {
        return ['date'];
    }
}

// class Book extends \Faker\ORM\Propel\EntityPopulator
// {
//     const PEER = 'Book';

//     public function getTableMap()
//     {
//         return 'book';
//     }


//     public function getColumns()
//     {

//     }
// }

// print_r($populator);die;
//
$populator->addEntity('Author', 5);
// $populator->addEntity('Book', 10);
$data = $populator->execute();
