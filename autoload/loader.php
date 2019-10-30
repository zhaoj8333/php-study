<?php

spl_autoload_register("my_autoloader", null, false);

function my_autoloader($className)
{
    $path = "./class/";
    echo $className, "\n";
    include $path . $className . '.php';
}

$myClass = new Dog();

$myClass = new Cat();

/* $myClass = new Bird(); */

