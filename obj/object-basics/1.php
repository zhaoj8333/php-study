<?php

// If a value of any other type is converted to an object, 
// a new instance of the stdClass built-in class is created. 
$obj = (object)['1' => 'foo'];

var_dump($obj);
var_dump($obj->{'1'});
var_dump(key($obj));

$obj = (object)'cainiao';
var_dump($obj);
var_dump($obj->scalar);

$obj = (object)1;
var_dump($obj);

$obj = (object)['age' => 10];
var_dump($obj);

$obj = (object)null;
var_dump($obj);     // empty std object
