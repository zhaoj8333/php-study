<?php

// static methods are functions with class scope

// You can access both methods and properties in the context of a class rather
// than that of an object

// access to non-static property by class will trigger fatal error
// They cannot themselves access any normal properties in
// the class because these belong to an object

// but a class instance can access its static properties

require_once '../object-basics/First.class.php';

class StaticExample extends First
{
    public $count = 78;

    public static $num = 12;

    public static function sayHello()
    {
        self::$num = 123321;
        return 'hello';
    }

    public static function test()
    {
        var_dump(First::$name); // self, parent, parent class name are ok
    }

    //      Making a method call using parent is the only circumstance in which you should use a static
    // reference to a nonstatic method.
    // unless you are accessing an overridden method, you should only ever use :: to access a method or property
    // that has been explicitly declared static.
    // In documentation, however, you will often see static syntax used to refer to a method or property. t his does
    // not mean that the item in question is necessarily static, just that it belongs to a certain class. t he write()
    // method of the ShopProductWriter class might be referred to as ShopProductWriter::write(), for example,
    // even though the write() method is not static. You will see this syntax here when that level of specificity is
    // appropriate
    public static function demo()
    {
        // var_dump($this->num);
        // can not use $this variable in static methods, $this shoud use in object context(as nonstatic context)
        print(parent::getName());
    }
}

// var_dump(StaticExample::sayHello());
// var_dump(StaticExample::$num);

$staticObj = new StaticExample();
// var_dump($staticObj->num);
// var_dump($staticObj->sayHello());

// StaticExample::test();
StaticExample::demo();

// Static methods are functions with class scope. They cannot themselves access any
// normal properties in the class because these would belong to an object
// var_dump(StaticExample::$count);

