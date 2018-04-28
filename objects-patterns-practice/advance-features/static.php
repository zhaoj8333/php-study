获取获取<?php
abstract class DomainObject
{
    public static $name;

    public function __construct()
    {
        $this->name = static::getName();
    }

    public static function create(): DomainObject // reture value type declaration will cause parse error in php5
    {
         // self does not refer to the calling context; it refers to the context of resolution.
        // self resolves to DomainObject, the place where create() is defined, and not to User,
        // return new self(); // can not instantiate abstract class
        //

        // static is similar to self, except that it refers to the invoked rather than
        // the containing class.
        return new static();
    }

    public static function getName()
    {
        return 'DomainObject';
    }
}

class User extends DomainObject
{
    public static function getName()
    {
        return 'user';
    }
}

class Document extends DomainObject
{
}

// $user = User::create();
// var_dump(User::getUser()); // :: way can access no static methods
// var_dump($user);
// var_dump(User::create());
// var_dump(Document::create());

function test(): string
{
    return 1;
}
var_dump(test());