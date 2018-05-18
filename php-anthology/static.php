<?php

// 静态变量
// 1. 在函数执行完后，变量值仍然保存

function testStatic()
{
    static $val = 1;
    echo $val , "\n";
    $val ++;
}

// testStatic(); // 1
// testStatic(); // 2
// testStatic(); // 3

// 2. 修饰属性或方法，可以通过类名访问，如果是修饰的是类的属性，保留值
class Person
{
    static $id = 0;

    function __construct()
    {
        self::$id ++;
    }

    static function getId()
    {
        return self::$id;
    }
    // 3. 修饰类的方法里面的变量
    //
    static function tellAge()
    {
        static $age = 0;
        $age++;
        echo 'the age is ', $age, "\n";
    }
}

// var_dump(Person::$id);

// $p1 = new Person();

// var_dump(Person::$id);

// $p2 = new Person();
// $p3 = new Person();

// var_dump(Person::$id);
//
// echo Person::tellAge(); // 函数执行完后, 变量值仍然保存
// echo Person::tellAge();
// echo Person::tellAge();
// echo Person::tellAge();


// 4. 修饰全局作用域的变量,没有实际意义
// static $name = 1;
// $name ++;
// echo $name; // 2


// 三个test变量互不影响, 各有各的作用域
//
$test = 0;
$test++;

function test1()
{
    static $test = 100;
    $test++;
    echo $test, "\n";
}

function test2()
{
    static $test = 1000;
    $test++;
    echo $test, "\n";
}

// test1();
// test2();
// echo $test, "\n";

$age = 0;
$age++;

for ($i=0; $i < 10; $i++) {
    # code...
}