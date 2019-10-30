<?php

// 
//
class A 
{
    public static function who()
    {
        echo __CLASS__, "\n";
    }

    public static function testSelf()
    {
        // self always resolves to the class in which it is used.
        self::who();
    }

    public static function testStatic()
    {
        static::who();
    }

    private function foo()
    {
        echo "success! \n";
    }

    public function test()
    {
        $this->foo();
        static::foo();
    }
}

class B extends A
{
    public static function who()
    {
        echo __CLASS__, "\n";
    }
}

class C extends A
{
    private function foo()
    {

    }
}

// A::testSelf();
// B::testSelf();

// Late static binding introduces a new use for the static keyword, 
// which addresses this particular shortcoming. When you use static, 
// it represents the class where you first use it, ie. it 'binds' to the runtime class.
// A::testStatic();
// B::testStatic();

$b = new B();
$b->test();

$c = new C();
$c->test();
