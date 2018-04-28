<?php
class ShopProduct
{
    public $title = 'default shop product';

    public $productName = 'default product name';

    public $productPrice = 100;

    function __construct($name, $price)
    {
        $this->productName = $name;
        $this->productPrice = $price;
    }

    public function getProductname()
    {
        return $this->productName;
    }

    public function setProductname($name)
    {
        $this->productName = $name;
    }
}

// inheritance problem

// the parent's features are fixed, but when add new features to it,
// there is two ways:
//
// throw all data into the parent class
// it will add redundant methods or properties to the parent class which is is unnecessary according to the parent class
// the whole class may be complex and hard to manage

// split parent class into two separate classes

// this may cause duplication problems
// if another function or class use this class, you may have to pass an object
// of the correct type, you have to add your own type checking

class BookProduct extends ShopProduct
{
    public$num;

    function __construct($num, $name, $price)
    {
        parent::__construct($name, $price);
        $this->num = $num;
    }
}

$book = new BookProduct(12, 'PHP面向对象', 123);
var_dump($book);
