<?php


// the ability of different classes to share an interface
// An interface is one or more methods that let you use a class for a particular purpose.

require 'RudeMessage.php';
require 'TerseMesssage.php';
require 'PoliteMessage.php';
require 'MessageReader.php';


$classNames = [
    'PoliteMessage',
    'TerseMesssage',
    'RudeMessage'
];

$msgs = [];

srand((float)microtime() * 1000000);

for ($i = 0; $i < 10; $i++) {
    shuffle($classNames);
    // var_dump($classNames[0]);
    $msgs[] = new $classNames[0]();
}

$msgReader = new MessageReader($msgs);