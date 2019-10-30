<?php

class Father
{
    protected static $str = 'Father';

    public static function getStr()
    {
        // self只能引用当前类中的方法，而static关键字允许函数能够在运行时动态绑定类中的方法。
        echo get_called_class() . '----', "\n";
        // return self::$str;
        return static::$str;
    }
}

class Son extends Father
{
    protected static $str = 'Son';
}

var_dump(Son::getStr());
var_dump(Father::getStr());
