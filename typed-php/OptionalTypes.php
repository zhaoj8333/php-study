<?php

// null reference: a method is called on a null value
// 

// while (true) {
//     // object check
//     if (!is_object($deferredProcess)) {
//         break;
//     }

//     if (!method_exists($deferredProcess, 'complete')) {
//         break;
//     }

//     if ($deferredProcess->complete()) {
//         print $deferredProcess->result;
//         break;
//     }

//     sleep(1);
// }


// $use = $db
//     ->table('user')
//     ->where([])
//     ->first();

// if (!$user) {
//     print 'user not found';
// }

// $addr = $user->addr;

// if (!$addr) {
//     print 'addr not found';
// }

// print 'city' . $addr->city;

// the more we chain potentially null variables, the more we need to check;

// solve: decorate variables and intercept methods calls on null
// 

class User
{
    public $name;
    public $address;
    public $age;
    public $sex;
    public $job;

    
    public function __construct()
    {
        $this->name = 'meme da';
        $this->address = 'si chuan';
        $this->age = 19;
        $this->sex = 'girl';
        $this->job = 'student';
    }

    public function __call($name = '', $args = []) : void
    {
        echo $name, " 方法不存在， __call 被调用", "\n";
    }

    public function __get($key = '') : void
    {
        echo $key, " 成员不存在，__get被调用", "\n";
    }

    public function __toString() : String
    {
        $user = 'Name:' . $this->name . PHP_EOL;
        $user .= 'Address:' . $this->address . PHP_EOL;
        $user .= 'Age:' . $this->age . PHP_EOL;
        $user .= 'Sex:' . $this->age . PHP_EOL;
        $user .= 'Job:' . $this->job . PHP_EOL;

        return $user;
    }

    public function setName($name = '') : self
    {
        $this->name = $name;

        return $this;
    }

    public function setAddress($addr = '') : self
    {
        $this->address = $addr;

        return $this;
    }

    public function setJob($job = '') : self
    {
        $this->job = $job;

        return $this;
    }

    public function setAge($age = 0) : self
    {
        $this->age = $age;

        return $this;
    }

    public function setSex($sex) : self
    {
        $this->sex = $sex;

        return $this;
    }
}




$user = new User();

// $user->getName();
// $user->work;

// Method chaining, also known as named parameter idiom, is a common syntax 
// for invoking multiple method calls in object-oriented programming languages. 
// Each method returns an object, allowing the calls to be chained together in a 
// single statement without requiring variables to store the intermediate results.

$user->setName('aaa')->setAddress('bbbb')->setAge(10)->setJob('programer')->setSex('男');
// var_dump($user);
echo $user;
