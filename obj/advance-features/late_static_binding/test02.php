<?php

class A
{
    private static function foo()
    {
        echo "success!\n";
    }

    public static function test()
    {
        self::foo();
        static::foo();
    }
}

class B extends A
{
    // foo() will be copied to B, hence its scope will still be A and the call be successful
}

class C extends A
{
    private static function foo()
    {
        // original method is replaced, the scope is C
    }
}

B::test();

C::test(); // fails
