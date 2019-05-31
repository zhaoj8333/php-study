<?php

function __autoload($class)
{
    $classFile = 'classes/' . $class . 'class.php';
    if (file_exists($classFile)) {
        require_once dirname(__FILE__) . '/' .$classFile;
    } else {
        exit('unable to load class ' . $class);
    }
}

$user = new User();
var_dump($user);

$admin = new Admin();

var_dump($admin);

//PHP Deprecated:  __autoload() is deprecated, use spl_autoload_register() instead
