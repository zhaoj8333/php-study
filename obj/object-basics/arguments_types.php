<?php
declare(strict_types = 1); // this will trigger fatal error in php5

// Method and function definitions do not necessarily require that an argument should be of a particular type
// this has flexibility, but also This flexibility can also cause ambiguity to creep into code when a method body expects an
// argument to hold one type but gets another.

// You can determine the type of a variable’s value using one of PHP’s type-checking functions

// var_dump(is_bool('true'));
// var_dump(is_integer(111111000000000000000000000000));
// var_dump(is_int(2381289472489324));

class AddressManager
{
    private $addresses = ['209.131.36.159', '216.58.213.174'];

    // 关于resolve类型声明,可以通过注释解决
    // 也可以通过类型判断函数处理,强制该参数为布尔值
    public function outputAddress($resolve)
    {
        foreach ($this->addresses as $key => $address) {
            // if ($resolve) {
            //     print(gethostbyaddr($address)) . "\n";
            // }
            if (is_string($resolve)) {
                $resolve = preg_match("/^(false|no|off)$/i", $resolve) ? false :true;
            }
            if (is_bool($resolve)) {
                # code...
            }
            if ($resolve) {

                print(gethostbyaddr($address)) . "\n";
            }
        }
    }
}

$addrManager = new AddressManager();

// $addrManager->outputAddress('true');

// concentrates on the task it is designed to perform. This emphasis on performing a specific task in
// deliberate ignorance of the wider context is an important principle in object-oriented programming

class ShopProduct
{
    public $title = 'default shop product';

    public $productName = 'default product name';

    public $productPrice = 0;

    // arguments type checkis
    function __construct(string $name, int $price) // it will quietly turn a string into a float for us,
    // but if declare strict_type, it will cause fatal error
    // if it is php5, may be trigger a fatal error
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

    public function getProductprice()
    {
        return $this->productPrice;
    }

    public function isExceed(bool $exceed) // this will automatically coverts the exceed variable to a boolean
    {
        if ($exceed) {
            echo "超过了";
        } else {
            echo "没有超过";
        }
    }
}

class ShopWritter
{
        // class type declarations in php
    public function write(ShopProduct $shopProduct) // 强制该参数为ShopProduct类的实例
    {
        $str = $shopProduct->title . ": "
            . $shopProduct->getProductname()
            . " (" . $shopProduct->price . ")\n";
        print $str;
    }
}


// type declarations are checked at runtime.
$shop = new ShopProduct('aaa', 33);

// var_dump($shop);die;
$writter = new ShopWritter();

//  a signal that the method expects a ShopProduct object
// $writter->write($shop);

// this is appliable to functions params

function getShop(ShopProduct $shopProduct)
{
    var_dump($shopProduct->getProductname());
}
// getShop($shop);

$shop->isExceed((bool)'false'); // when declare(strict_types = 1), it will cause typeerror without type transform(coverting)[(bool)];

// A strict_types declaration applies to the file from which a call is made, and not to the file in which
// a function or method is implemented. So it’s up to client code to enforce strictness

