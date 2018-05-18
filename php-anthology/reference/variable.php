<?php

// 变量引用
//
// 变量的内存存储


// PHP内部，变量是存储在一个叫做zval的容器中。它不仅仅包含变量的值，也包含变量的类型。
// 变量容器中包含一些Zend引擎用来区分是否引用的字段。同时它也包含这个值的引用计数。

// 直接赋值

$a = 'zzz';

$b = '自增长';

$c = 123;


// 值传递
$a = 'zhou yu';
$b = $a;
$c = $a;

// 地址传递
$addr_a = 'zhou yu';
$addr_b = &$addr_a;
$addr_c = &$addr_a;

unset($addr_c);

// 遇到unset的时候，回收的并不是变量中的内存，而是链接中的指针关系
var_dump($addr_a, $addr_b, $addr_c);