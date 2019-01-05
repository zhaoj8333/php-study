<?php

class NumberType extends SplFloat
{
    public function toInteger()
    {
        return round($this);
    }

    public function toString()
    {
        return (string)$this;
    }
}


// SPL types are automatically unboxed when used in arithmetic expressions,
// cast, or concatenated. Any operator that
// would normally work with a scalar type will work with the corresponding SPL type
$number = new NumberType(123.89);
var_dump($number->toInteger());
var_dump($number->toString());
