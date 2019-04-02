<?php

class Animal
{
    private function eat()
    {
        echo 'eat';
    }

    public function __call($name, $args)
    {
        echo '调用不存在的方法：' . $name . '参数为：';
        print_r($args);
    }

    public static function __callStatic($name, $args)
    {
        echo '调用不存在的静态方法:' . $name . '参数为：';
        print_r($args);
    }   
}
$animal = new Animal();
//var_dump($animal); 
//$animal->drink($animal);
Animal::sound([1, 2, 3], [4, 5, 6]);
