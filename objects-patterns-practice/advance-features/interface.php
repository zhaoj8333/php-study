<?php
declare(strict_types = 1);

// Although abstract classes let you provide some measure of implementation, interfaces are pure templates.
// An interface can only define functionality; it can never implement it
interface IChargeable
{
    public function getPrice(): float;
}

interface IBookable
{
    public function getBooks(): array;
}

//  Any class that incorporates this interface
// commits to implementing all the methods it defines, or it must be declared abstract

// interfaces are pure templates
// An interface can only define functionality; it can never implement it
abstract class ShopProduct implements IChargeable, IBookable
{
    protected $price;
}

//  An implementing class takes on the type of the class
// it extends and the interface that it implements.

// a class can implement any number of interfaces,
// The extends clause should precede the implements clause
class ShopProductWriter extends ShopProduct
{
    public function getPrice(): float // this type varification happens in processing
    {
        return '1.2';
    }

    // Fatal error: Uncaught TypeError: Argument 1 passed to
    // ShopProductWriter::getCharge() must implement interface IChargeable,
    public function getCharge(IChargeable $charge)
    {

    }

    public function getBooks(): array
    {
        return [];
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
}

$shop = new ShopProductWriter();
// $shop->getCharge();
// $price = $shop->getPrice();
// var_dump($price);

// when setting uninitialized properties, the property you just set visualization is protected
$shop->setPrice(123);

// var_dump($shop->getBooks());