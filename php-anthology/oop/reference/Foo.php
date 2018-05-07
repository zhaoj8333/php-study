<?php

class Bar
{

}

class Foo
{
     // By pre-ceding the function name with the reference operator,
     // the value the function re-turns is passed by reference.
     //
     // 函数声明前加&:
     //
    function &getBar()
    {
        return new Bar();
    }
}

// $foo = new Foo();

// we also had to use a reference operator
// when assigning the return value of getBar to $bar
// $bar = &$foo->getBar();

// var_dump($foo);
// var_dump($bar);