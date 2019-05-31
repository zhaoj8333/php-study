<?php

class Consts
{
    // some properties should not be changed;
    // Error and status flags will often be hard-coded into your classes
    // client code should not be able to change them;
    const TIME_OUT = 60;

    // Constant properties can contain only primitive values, you can not assign a object to constants
    const OUTOF_STOCK = [1, 3];

    public static function getConsts()
    {
        // self::TIME_OUT = 1; // attempting to set a value on a constant once it has been declared will cause parse error
        return self::OUTOF_STOCK;
    }
}

var_dump(Consts::getConsts());