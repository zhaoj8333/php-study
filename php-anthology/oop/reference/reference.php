<?php

// pointer: contains an address in memory points to a variable
//
// php reference: variable names are linked with values in memory
//      automatically, using reference allow us to link two variable
//      names to the same value in memory
//
// 1. php和c中的变量名都会被解析成内存地址，变量名所代表的内存的地址中内容即代表变量的内容，
// 但由于指针的跳转，这个内容往往并不那么明显
// 2. 在c中不同的变量名即代表不同的内存地址，这个是一一对应的，但是在php中不同的变量名
// 可以代表相同的内存地址，这就是php中所谓引用别名的基础，和c的指针很像，却又有差别
//
// 对于变量a变量b,所在内存中都存储变量地址(指针)20011，在c中变量a和变量b的所解析的内存地址一定是不同的，分别是10011和10012，他们都同时指向20011，
// 但是在php中变量a和变量b就是一样的，都是10011，那么自然指向相同的内存地址20011
//
// reference:
//  variable passing
//  passing by value
$color = 'blue';
// $set['color'] = $color; // $set['color'] contains a copy of $color
// $color = 'red';

// var_dump($set); // blue

// passing by reference
$set['color'] = &$color;
// $set['color'] contains a reference to the original $color variable
$color = 'green';
// var_dump($set); // green
// Passing by reference allows us to keep the new variable “linked” to the original source variable.
//
//
// passing variable as an argument to a function:
//  php works with a copy of the original variable inside the function

function isPrimaryColor($color)
{
    switch ($color) {
        case 'red':
        case 'blue':
        case 'green':
            return true;
            break;
        default:
            return false;
    }
}

$color = 'blue';

// if (isPrimaryColor($color)) {
//     echo $color , ' is a primary color';
// } else {
//     echo $color , 'is not';
// }


class ColorFilter
{
    var $color;


    function __construct(&$color)
    {
        // $color is a copy
        //
        // $color is a reference
        // Notice that we have to use the reference operation twice here. This is because
        // the variable is being passed twice—first to the constructor function,
        // then again, to place it in a member variable.
        //
        // The reference operator saves PHP from having to create a copy of the
        //  newly-created object to store in another variable
        $this->color = &$color;
        // $this->color is a copy
    }

    public function isPrimaryColor()
    {
        switch ($this->color) {
            case 'red':
            case 'blue':
            case 'gree':
                return true;
                break;
            default:
                return false;
        }
    }
}

$color = 'blue';
// $filter = new ColorFilter($color);

// if ($filter->isPrimaryColor()) {
//     echo $color , ' is a primary color';
// } else {
//     echo $color , 'is not';
// }

