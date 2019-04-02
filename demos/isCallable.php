<?php

function demoFunction() {
    echo 'demo';
}

$funcName = 'demoFunction';
//var_dump(is_callable($funcName, true, $callableName));
//var_dump($callableName);
//

class SomeClass
{
    function someMethod() {
        echo 'someclass somemethod';
    }
}

$obj = new SomeClass();
$methodVar = array($obj, 'someMethod');
var_dump(is_callable($methodVar, true, $callableName));
var_dump($callableName);
