<?php

function &test()
{
    // 静态变量: 在函数执行完后，变量值仍然保存
    static $b = 0;
    $b = $b + 1;
    return $b;
}

$a = test();
var_dump($a); // 1

$a = 5;
$a = test();
var_dump($a); // 2

$a = &test();
var_dump($a); // 3

$a = 5;
$a = test();
var_dump($a); // 6