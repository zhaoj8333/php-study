<?php
// An abstract class cannot be instantiated. Instead it defines (and, optionally, partially implements) the
// interface for any class that might extend it.

abstract class ShopProductWritter
{
    protected $products = [];

    public function addProduct(ShopProduct $shopProduct)
    {
        $this->products[] = $shopProduct;
    }
    // In creating an abstract method, you ensure that an implementation will be available in all concrete
    // child classes
    abstract protected function write();
}


// $writter = new ShopProductWritter(); // can not instantiate abstract class

// So any class that extends an abstract class must implement all
// abstract methods or itself be declared abstract.
class ErrorWritter extends ShopProductWritter
{
    // when extends a abstract class which contains abstract method; the abstract methods must be implemented

    //  the implementing method cannot be stricter than that of the abstract method
    // The implementing method should also require the same
    // number of arguments as the abstract method, reproducing any class type hinting
    // arguments must be compatible with parent methods arguments
    public function write()
    {
        return file_put_contents($file, $str);
    }
}


class XmlProductWritter extends ShopProductWritter
{
    public function write()
    {
        $writer = new XMLWriter();
        $writer->openMemory();
        $writer->startDocument('1.0', 'UTF-8');
        $writer->startElement('products');

        foreach ($this->products as $key => $product) {
            $writer->startElement('product');
            $writer->writeAttribute('title', $product->getTitle());
            $writer->startElement('summary');
            $writer->text($product->getSummaryLine());
            $writer->endElement();
            $writer->endElement();
        }

        $writer->endElement();
        $writer->endDocument();
        print($writer->flush);
    }
}

// var_dump(extension_loaded('xmlwriter'));

$xmlObj = new XmlProductWritter();
// var_dump($xmlObj);
$xmlObj->write();

class TextProductWritter extends ShopProductWritter
{
    public function write()
    {
        $str = "PRODUCTS:\n";
        foreach ($this->products as $key => $product) {
            $str .= $product->getSummaryLine();
        }
        print($str);
    }
}

// A method that requires a ShopProductWriter object will not know which of
// these two classes it is receiving, but it can be absolutely certain that
// a write() method is implemented