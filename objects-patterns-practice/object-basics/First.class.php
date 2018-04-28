<?php

// it is classes that shape objects
// a class is a code template used to generate one or more objects

class First
{

    function __construct()
    {
        self::$name = 'aaa';
    }

    public static $name = '111';

    public $age  = 123;

    protected function getName()
    {
        return self::$name;
    }
}

// object is data that has been structured according to the template
// defined in a class
// an object is an instance of its class
// it is ofthe type defined by the class
$firstObj = new First(); // $firstObj is a copy of the object identifier
// object variable is a variable which refers to the First instatiated Object
// and it contains the idetifier of the object

// $firstObj->name = 'aaa';
// $firstObj->age = 122;

// --------- objects are passed by references by default". This is not completely true. -------------

// A PHP reference is an alias, which allows two different variables to write to the same value.
// As of PHP 5, an object variable doesn't contain the object itself as value anymore.
// It only contains an object identifier which allows object accessors to find the actual object.

// When an object is sent by argument, returned or assigned to another variable,
// the different variables are not aliases: they hold a copy of the identifier, which points to the same object.

$firstCopy = $firstObj;         // copy the object idetifier, which refers to the FirstClass instatiated object, different memory location;
// var_dump($firstObj->name);
$firstRef  = &$firstObj;        // a new variable refer to the object variable(same memory location)
// var_dump($firstRef->name);
$firstClone = clone $firstObj;  // the keyword 'new' is to create, 'clone' is actually clone a new object, which lies in different memory loction
// var_dump($firstClone->name);

$a = new First();
function setName($obj)
{
    $obj->name = 'bbb';
}
setName($firstClone);
// var_dump($firstClone->name); // bbb
// var_dump($firstObj->name); // 111

// die;
$firstObj->name = 'bbb';
$firstObj->age = 000;

// var_dump($firstObj); // 1
// unset($firstObj);
// var_dump($firstRef); // 1
// var_dump($firstCopy); // 1
// var_dump($firstClone); // 2
$secondObj = new First();

// $firstObj, $secondObj are different instances of the same type(First class)
// each objects has its own unique identifier(the identifier is unique for the life of the object)
//
// object identifier 对象标识符

 // Every object that is created in a PHP script is also given its own unique identifier. (Note
// that the identifier is unique for the life of the object; that is, PHP reuses identifiers, even within a process
// var_dump($firstObj, $secondObj);