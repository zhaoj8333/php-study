<?php

// method visibility is explicitly for all methods is encouraged

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

//  You should design your
// classes so that users of objects can be sure of their features

$shop = new ShopProduct('萝卜', 0.5);
echo "product name is : {$shop->getProductname()}";