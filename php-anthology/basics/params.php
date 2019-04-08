<?php

declare(strict_types = 1);

class Demo
{
    const DEFINED_CONST = 'const';
}

class Test
{
    
    public function getTest($test = Demo::DEFINED_CONST)
    {
        return $test;
    }
}


// var_dump(Test::getTest());

// 可变参数
function myfunc(... $params) {
    var_dump($params);
    /**
    var_dump(func_num_args());
    var_dump(func_get_arg(0));
    var_dump(func_get_args());
    */
}

// myfunc(1, 'abc', false, new stdClass(), null, ['a', 'b', 'c']);
// myfunc();

function testParams(int $int, string $str, array $arr, stdClass $stdObj)
{
    var_dump(func_get_args());
}

// testParams(2, 'abcd', ['a', 'b', 'c'], new stdClass());

// 数组转化为参数列表
$params = [
    1,
    'abc',
    ['a', 'b', 'c'],
    new stdClass(),
];
// testParams(...$params);
//


// 部分参数指定
function partial(string $name, ...$properties)
{
    var_dump($name, $properties);
} 

partial('mmd', ['b', 'c']);
