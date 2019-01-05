<?php


class Demo
{
    const DEFINED_CONST = 'const';
}

class Test
{
    
    public function getTest($test = Demo::DEFINED_CONST)
    {
        return $test;
    }
}


var_dump(Test::getTest());
