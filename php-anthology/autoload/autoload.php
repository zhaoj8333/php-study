<?php
spl_autoload_register('Autoload::loadClass', true, true);

class Autoload
{
    public static function loadClass($class)
    {
        if (is_file($class . '.php')) {
            require $class . '.php';
        } else {
            exit('class ' . $class . ' does\'nt exist');
        }
    }
}

// new Redis();
