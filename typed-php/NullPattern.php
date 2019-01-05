<?php
interface Animal
{
    public function makeSound();
}

class Dog implements Animal
{
    public function makeSound()
    {
        echo "woof ...";
    }
}


class Cat implements Animal
{
    public function makeSound()
    {
        echo "meo ...";
    }
}


class NullAnimal implements Animal
{
    public function makeSound()
    {
    }
}


$aminalType = 'elephant';

switch ($animalType) {
    case 'dog':
        $animal = new Dog();
        break;
    case 'cat':
        $animal = new Cat();
        break;
    default:
        $animal = new NullAnimal();
        break;
}

// a null object is an object with no referenced value or with defined neutral("null") behavior. 
// The null object design pattern describes the uses of such objects and their behavior(or lack thereof).

$animal->makeSound();
