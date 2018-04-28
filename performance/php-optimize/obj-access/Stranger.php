<?php

class Stranger
{
    public $gender = null;

    public $age = null;

    // public function getGender()
    // {
    //     return $this->_gender;
    // }

    // public function getAge()
    // {
    //     return $this->_age;
    // }

    // public function setGender($gender)
    // {
    //     $this->_gender = $gender;
    // }

    // public function setAge($age)
    // {
    //     $this->_age = $age;
    // }

}

// non-encapsulation test

$strangerObj = new Stranger();

$start = microtime(true);

for ($i = 0; $i < 100000; $i++) {
    $strangerObj->gender;
}

echo microtime(true) - $start , "\n"; // 0.0095