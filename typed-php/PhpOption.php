<?php

require './vendor/autoload.php';

class MyRepository
{
    public function findSomeEntity($criteria)
    {
        return \PhpOption\Option::fromValue($this->em->find(''));

        // or, if you want to change the none value to false for example:
        return \PhpOption\Option::fromValue($this->em->find(''), false);
    }
}
$repo = new MyRepository();

var_dump($repo->findSomeEntity('aaa')->get());
