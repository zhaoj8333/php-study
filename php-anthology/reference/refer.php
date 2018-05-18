<?php

// $a = range(0, 3);

// xdebug_debug_zval('a');

// // var_dump(memory_get_usage());

// $b = $a;

// // var_dump(memory_get_usage());
// xdebug_debug_zval('a');

// $a = range(0, 3);

// xdebug_debug_zval('a');

// 第二步只进行了COPY 操作，使$a , $b 指向同一个内存地址， refcount = 2，而第三步 发生了写操作（is_ref=0 不是引用），重新开辟了内存地址，refcount= 1

// var_dump(memory_get_usage());

// PHP 中COW（Copy On  Write）会导致赋值是引用上一个变量的地址（内存不会发生太大变化），
// 只有在发生 写 操作的时候，才会开辟新的内存地址


// 使用引用
// $a = range(0, 3);
// // var_dump(memory_get_usage());
// xdebug_debug_zval('a');

// $b = &$a;
// // var_dump(memory_get_usage());
// xdebug_debug_zval('a');

// unset($b);

// $a = range(0, 3);
// // var_dump(memory_get_usage());
// xdebug_debug_zval('a');


// class Person
// {

//     public $person = 'zs';
// }

// $p1 = new Person();
// xdebug_debug_zval('p1');

// $p2 = $p1;
// xdebug_debug_zval('p1');

// $p2->person = 'aaa';
// xdebug_debug_zval('p2');


// $a = 'aaaa';

// $b = &$a;

// unset($a);

// var_dump($b);


// function test(&$a) // 这里$b传递给函数的其实是$b的变量内容所处的内存地址
// {
//     $a = $a + 100;
//     xdebug_debug_zval('a');
// }

// $b = 1;
// // xdebug_debug_zval('b');
// test($b);

// // test(1); // Only variables can be passed by reference

// echo $b; // 101
//

// 函数引用
function &test()
{
    static $b = 0;
    $b = $b + 1;
    // echo $b;
    return $b;
}

$a = test();  // 1
var_dump($a);
$a = 5;
var_dump($a); // 5
$a = test();
var_dump($a); // 2

// // 通过这种方式$a=test();得到的其实不是函数的引用返回，这跟普通的函数调用没有区别　
// // 至于原因：　这是ＰＨＰ的规定 ＰＨＰ规定通过$a=&test(); 方式得到的才是函数的引用返回
// // ＰＨＰ手册上说：引用返回用在当想用函数找到引用应该被绑定在哪一个变量上面时。
echo "//////////////// \n";

$a = &test(); // 3
var_dump($a);
$a = 5;
var_dump($a); // 5
$a = test();

// var_dump($a); // 6

// $a=&test()方式调用函数呢, 他的作用是　
// 将return $b中的　$b变量的内存地址与$a变量的内存地址　
// 指向了同一个地方 即产生了相当于这样的效果($a=&b;) 所以改变$a的值
//


// function test1(&$b)
// {
//     $b ++;
//     return $b;
// }

// $a = 100;
// // $result = test1($a);
// // var_dump($result);
// // test1($a);

// $result = &test1($a);

// var_dump($result);