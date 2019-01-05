<?php

class Person
{

    // private $name;
    // private $age;
    // private $sex;
    // private $addr;
    // private $time;

    private $_config = [
        'name' => '',
        'age' => 0,
        'sex' => '',
        'addr' => '',
        'time' => '',
    ];
    
    // public function __construct($name, $age, $sex, $addr, $time)
    // {
    //     $this->name = $name;
    //     $this->age = $age;
    //     $this->sex = $sex;
    //     $this->addr = $addr;
    //     $this->time = $time;
    // }

    public function __get($name)
    {
        if (isset($this->_config[$name])) {
            return $this->_config[$name];
        }

        return null;
    }

    public function __set($name, $value)
    {
        if (isset($this->_config[$name])) {
            $this->_config[$name] = $value;
        }
    }

    public function __toString()
    {
        return get_class($this);
    }

    public function setTime($time)
    {
        $this->time = $time;
    }
}


$p = new Person();
// var_dump($p);
// $p->setTime(time());
// var_dump($p);

// $p->name = 'english name';
$p->name = 'aaaaaaaaaaaaa';

var_dump($p);
