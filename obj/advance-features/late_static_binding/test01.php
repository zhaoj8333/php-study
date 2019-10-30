<?php

class A
{
    public static function who()
    {
        echo __CLASS__,"\n";
    }

    public static function test()
    {
        // 使用 self:: 或者 __CLASS__ 对当前类的静态引用，取决于定义当前方法所在的类
        self::who();
        static::who();
    }
}

class B extends A
{
    public static function who()
    {
        echo __CLASS__,"\n";
    }

}

A::test();

B::test();
