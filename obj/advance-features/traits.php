<?php
declare(strict_types = 1);
// what if you want to share an implementation across inheritance hierarchies

// A trait is a class-like structure that cannot itself be instantiated but can be incorporated into classes
// A trait changes the structure of a
// class, but doesn’t change its type. Think of traits as includes for classes

class ShopProduct
{
    private $taxRate = 17;

    public function calculateTax(float $price): float
    {
        return (($this->taxRate / 100) * $price);
    }
}

// $product = new ShopProduct();
// print($product->calculateTax(123.12));

// Of course, a subclass gains access to calculateTax(). But what about entirely different class hierarchies also use the calculateTax

// without traits , you have to duplicate calculateTax

abstract class Service
{

}

class UtilityService extends Service
{
    private $taxRate = 17;

    public function calculateTax(float $price): float
    {
        return (($this->taxRate / 100) * $price);
    }
}

// One of the core object-oriented design goals is the removal of duplication

trait PriceUtilities
{
    private $taxrate = 17;

    private function showPrice()
    {
        return '显示价格';
    }

    protected function setPrice()
    {
        return '设置价格';
    }

    public function calculateTax(float $price): float
    {
        return (($this->taxrate / 100) * $price);
    }

    public function utility()
    {
        return 'price';
    }
    // other utilities
}

interface Iidentity
{
    public function generateId(): string;
}

trait IdentityUtility
{
    private $user;

    private function utility()
    {
        return 'user';
    }

    public function generateId(): string
    {
        return uniqid();
    }
}

class User implements Iidentity
{
    use IdentityUtility, PriceUtilities {
        IdentityUtility::utility insteadof PriceUtilities;
    }

    public function getUsers()
    {
        return ['user'];
    }
}

// Although traits are useful, they don’t change the type of the class to which they are applied

// traits play well with interfaces. I can define an interface that requires a generateId() method,
// and then declare that ShopProduct implements its

// when trait is used , the methods of the trait is injected in the class which used it,
// but when another class extends it, you have to reuse it

class TestUser implements Iidentity
{
    use PriceUtilities;

    public function getUser(User $userObj)
    {
        return $userObj->getUsers();
    }

    public function generateId(): string
    {
        return $this->generateId();
    }

    public function getTax()
    {
        return $this->calculateTax(1231.12);
    }
}

$user = new TestUser();
// var_dump($user->getUser(new User()));
// var_dump($user->getTax());
// var_dump(get_class_methods('TestUser'));

// class Demo
// {
//     // use PriceUtilities, IdentityUtility;

//     public function getDemo()
//     {
//         // return $this->utility();
//     }
// }

// $demo = new Demo();
// var_dump($demo->getDemo());

// methods name conflicts
trait TaxTool
{
    function calculate(float $price): float
    {
        return 222;
    }
}

trait PriceTool
{
    function calculate(float $price): float
    {
        return 111;
    }
}

class Tool
{
    use TaxTool, PriceTool, IdentityUtility, PriceUtilities {
        TaxTool::calculate insteadof PriceTool;
        PriceTool::calculate as priceCalculate;
        IdentityUtility::utility insteadof PriceUtilities;
        PriceUtilities::utility as priceUtility;  // alias: as
    }

    public function toolCalculate()
    {
        print($this->priceUtility()) . "\n";
        return $this->calculate(123.12);
    }
}

$tool = new Tool();
// var_dump(get_class_methods('Tool'));
// var_dump($tool->toolCalculate());


interface ICache
{
    public function get(string $key);

    // public function set(string $key, string $value);

    // public function getAll(string $key): array;

    // public function remove(string $key);
}

trait CacheDb
{
    public static function connect()
    {
        echo "connect to cache server";
    }

    // accessing properties in host class: both set and get
    // but it is a totally bad design; because you are not sure that the host class
    // contain the specified properties in the traits
    // traits must contains the code that can be used across many different classes;

    // public function setDb($dbName)
    // {
    //     $this->db = $dbName;
    // }

    // public function getDb()
    // {
    //     return $this->db;
    // }

    // declare a abstract methods to force the using class to declare the same method
    abstract function getAll(string $dbHost, string $key);

}

class Memcache implements ICache
{
    use CacheDb {
        CacheDb::connect as public; // change access rights to trait methods
    }

    // public $db;

    public function get(string $key)
    {
        return '获取数据' . $key;
    }

    public function getAll(string $dbHost, string $key)
    {

    }
}

$mem = new Memcache();
// var_dump($mem);
Memcache::connect();
