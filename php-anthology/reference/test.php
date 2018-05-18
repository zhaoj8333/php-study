<?php

// php变量引用: 不同变量指向同一地址
// 定义一个变量a,此时内存开辟一块区域,$a指向该区域
$a = 100;
// var_dump($a);

// 定义变量$b,将变量a的值赋给b,此时该区域有两个($a, $b)指向
$b = $a;
// var_dump($b);

// 修改$a变量的值,php具有 (copy on write)的属性,所以会复制并重写a所指向的区域,
// 此时, $a, $b指向不同区域
$a = 10;
// var_dump($a);


// 当引用指向时, php补在具有(copy on write)属性, 多个变量指向同一区域
// 此时, unset只能消除变量引用,不能删除其内存分配的空间
$c = 200;
$d = &$c;
$c = 10;
// var_dump($d);

$arr = [
    'a' => 1,
    'b' => 2,
    'c' => 3
];


// 因为你用到了&,所以循环就不是把$arr的值赋予变量$val，
// 而是$val的地址指向了$arr[$key],而这是个循环，最后是不是就是$val指向了$arr['c']
foreach ($arr as $key => &$val) {
    // var_dump($val);
}

// var_dump('$val的值为: ' . $val); // 3
// $val = 3;

// var_dump($arr);


foreach ($arr as $key => $val) {
    // 这里的$val就相当是$arr['c']
    //
    // 你循环一次，把$arr['a']的值也就是1，赋予了$arr['c'],那么$arr就变成array('a'=>1,'b'=>2,'c'=>1)
    //
    // 循环2次时，把b的值赋予了c,$arr是不是就成array('a'=>1,'b'=>2,'c'=>2)
    //
    // 3次时，c都是2了,把c的值赋予c
    //
    // 所以foreach($arr as $key=>$arr['c'])和该循环就等同了
}

// var_dump($arr);


// $arr = ['a', 'b', 'c'];
// foreach ($arr as $key => $val) {
//     $val = &$arr[$key];
//     // var_dump($arr[$key]);
//     // var_dump($val);
// }
// var_dump($arr);
// /home/zhaojun/www/php-study/php-anthology/oop/reference/test.php:28:
// array (size=3)
//   0 => string 'a' (length=1)
//   1 => string 'b' (length=1)
//   2 => string 'c' (length=1)
// /home/zhaojun/www/php-study/php-anthology/oop/reference/test.php:28:
// array (size=3)
//   0 => string 'b' (length=1)
//   1 => string 'b' (length=1)
//   2 => string 'c' (length=1)
// /home/zhaojun/www/php-study/php-anthology/oop/reference/test.php:28:
// array (size=3)
//   0 => string 'b' (length=1)
//   1 => string 'c' (length=1)
//   2 => string 'c' (length=1)

// /home/zhaojun/www/php-study/php-anthology/oop/reference/test.php:28:
// array (size=3)
//   0 => string 'b' (length=1)
//   1 => string 'c' (length=1)
//   2 => string 'c' (length=1)



function &test()
{
    // 静态变量: 在函数执行完后，变量值仍然保存
    static $b = 0;
    $b = $b + 1;
    return $b;
}

// $a = test();
// var_dump($a); // 1

// $a = 5;
// $a = test();
// var_dump($a); // 2

// $a = &test();
// var_dump($a); // 3

// $a = 5;
// $a = test();
// var_dump($a); // 6
//
//
// 性能考虑
// PHP自身的 写时复制 (copy on write)机制可以避免因为变量复制带来的内存开销,
// $a = 3;
// $b = $a;
// 此时并不会带来额外的内存开销, 两个变量指向同一个内存地址,只有当两个变量值不一致
// 时, 才会有额外的内存销号;
//
// 当变量很小时, 避免引用;
// 当变量(对象, 数组, 字符串)很大时, 尽量使用引用;


// php 5 中的对象拷贝


class Animal
{

    public $age = 3;

    public function bark()
    {
        echo "barking";
    }

    public function __clone()
    {

    }
}

$a = new Animal();

$d = clone $a;

$a->age = 12;

var_dump($a->age);

xdebug_debug_zval('a');

xdebug_debug_zval('d');

var_dump($d->age);