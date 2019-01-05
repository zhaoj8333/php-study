<?php

class StringBox
{

    /**
     * [$data string]
     * @var [string]
     */
    protected $data;
    
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * [__toString 打印一个对象时被调用]
     * @return string [string]
     */
    public function __toString()
    {
        return $this->data;
    }

    public function toString()
    {
        return (string)$this->data;
    }

    public function toUpperCase()
    {
        return strtoupper($this->data);
    }

    public function toLowerCase()
    {
        return strtolower($this->data);
    }

    public function getIndexOf($needle, $offset = 0)
    {
        $index = strpos($this->data, $needle, $offset);

        if ($index === false) {
            return -1;
        }

        return $index;
    }
}

$box = new StringBox('class aaa');

// var_dump($box->toString());
// var_dump($box->__toString('AAA'));

echo $box->toString();
echo "\n";
echo $box->__toString();
echo "\n";
echo (string)$box;

// __toString
