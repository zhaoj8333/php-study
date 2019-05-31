<?php
declare(strict_types = 1);

class Property
{
    public static $name = '';

    public static function getName()
    {
        return self::$name;
    }
}

function test()
{
    return 'test';
}

class Types
{
    public $array;
    public $int;
    public $float;
    public $callable;
    public $bool;
    public $string;
    public $self;
    public $obj;

    function __construct(
        array $array,
        int $int,
        float $float,
        callable $callable,
        bool $bool,
        string $string,
        // self $self,
        Property $obj
    ) {
        $this->array    = $array;
        $this->int      = $int;
        $this->float    = $float;
        $this->callable = $callable;
        $this->bool     = $bool;
        $this->string   = $string;
        // $this->self  = $self;
        $this->obj      = $obj;
    }
}

$property = new Property();

$type = new Types([1, 2], 34, 1, 'test', true, 'a', $property);
var_dump($type);