<?php

$func = function () {
    echo "func";
};
// var_dump($func); // object(Closure)#1 (0) {}

// $func = function ($param) {
//     var_dump($param);
// };

// $func('some thing');

// $func = function () {
//     return 1;
// };
// var_dump($func);
// var_dump($func());

function printStr() {
    $func = function($str)
    {
        echo $str;
    };
    $func('something ');
}
$res = printStr();
// var_dump($res);


function getPrintStr() {
    $func = function($str) {
        echo $str;
    };
    return $func;
}

// $res = getPrintStr();
// $res('some thing');

function callFunc($func)
{
    $func('something');
}

$func = function($str) {
    echo $str;
};





// die;
class A
{
    private static $sfoo = 1;
    private $ifoo = 2;
}

$cl1 = static function() {
    return A::$sfoo;
};

// var_dump($cl1);


$cl2 = function() {
    return $this->ifoo;
};

// var_dump($cl2);

class Product
{
    public $name;
    public $local;
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->local = 'usa';
    }
}

$p1 = new Product('p1');
echo $p1->local, "\n";
//

$p2 = \Closure::bind(function() {
    $this->local = 'germany';
    return $this;
}, new Product('nice product'), 'Product');

var_dump($p2);

