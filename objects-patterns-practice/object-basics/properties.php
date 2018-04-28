<?php
// property, called member variable of a class, holds data that can vary from object to object


// a variable defined in a function exists in local
// scope, and a variable defined outside of the function exists in global scope. A s a rule of thumb, it is not possible
// to access data defined in a scope that is more local than the current one
function testScope()
{
    $scope = 'test';
}
testScope();
// var_dump($scope); // null

//  object are permeable than function

class ShopProduct
{
    public $title = 'default shop product';

    public $productName = 'default product name';

    public $productPrice = 100;
}

$shopA = new ShopProduct();
$shopA->title = 'aaa';
echo $shopA->title . "\n";

$shopB = new ShopProduct();
$shopB->title = 'bbb';
echo $shopB->title . "\n";


// dynamically set properties
// this is disencouraged

 // When you create a class you define a type. You inform the world that your class
// (and any object instantiated from it) consists of a particular set of fields and functions

 // There can be no guarantees about properties that have been dynamically set, though

// 因为你在创建类的时候就已经定义了数据类型，说明这个类（以及由类实例化的对象）是由特定的字段和函数集合组成。
// 如果A类定义了一个$name属性，那么之后任何和a对象一起工作的代码都假设$name属性是可用的，但新增动态属性则没有这种保证。
// 也就是说，你在实例化另一个对象aa时，它并不具有$sex这个属性，将会使程序报错。
$shopA->seller = 'bench';
// var_dump($shopA);

// dynamically unset properties
unset($shopA->productPrice);
// var_dump($shopA);


// when dynamically setting properties, there may be misspell the property name ;
// and it will cause exception
// but when you access the property you setted , you will get unexpected results

