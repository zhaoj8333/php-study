<?php

class Person
{
    private $_gender = null;

    private $_age = null;

    public function getGender()
    {
        return $this->_gender;
    }

    public function getAge()
    {
        return $this->_age;
    }

    public function setGender($gender)
    {
        $this->_gender = $gender;
    }

    public function setAge($age)
    {
        $this->_age = $age;
    }

}

// encapsulation test

$personObj = new Person();

$start = microtime(true);

for ($i = 0; $i < 100000; $i++) {
    $personObj->getGender();
}

echo microtime(true) - $start , "\n"; // 0.06155