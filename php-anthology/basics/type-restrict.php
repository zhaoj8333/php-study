<?php

//declare(strict_types = 1);

class MyClass
{
    /**
     * 
     *
     */
    public function test(OtherClass $otherClass)
    {
        echo $otherClass->var;
    }

    public function testArr(array $arr)
    {
        var_dump($arr);
    }
}

class OtherClass
{
    public $var = "otherclass var\n";
}

$myClass = new MyClass();
//$myClass->test(new OtherClass());
// $myClass->test(new stdClass());

//$myClass->testArr([]);


function test(stdClass $object = null)
{
    var_dump($object);  
}

//test(NULL);
//test(new stdClass);
// test(new MyClass());
//
//
// php7
function sum(int ...$ints) : int  // 返回值类型约束
{
    return array_sum($ints);
}

//var_dump(sum(3, 4, 4)); // 严格模式下，第二个参数类型必须是integer

// 依赖注入 控制反转
//
//
// 正转
/**
class C
{
    public function say()
    {
        echo 'hello';
    }
}

class A
{
    private $c;
    
    // C就是A的外部资源，主动请求C的资源，
    // 内部控制对象实例的创建
    public function __construct()
    {
        $this->c = new C();
    }

    public function sayC()
    {
        echo $this->c->say();
    }
}

$a = new A();
$a->sayC();
 */


/**
 * 反转
 */
class C
{
    public function say()
    {
        echo 'hello';
    }
}

class A
{
    private $c;
    public function setC(C $c)
    {
        $this->c = $c;
    }

    public function sayC()
    {
        echo $this->c->say();
    }
}

$c = new C();
$a = new A();

$a->setC($c);
$a->sayC();
