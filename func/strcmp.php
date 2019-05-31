<?php

// var_dump(strcmp('a', 'abb'));
// var_dump(strcmp('aaa', 'aaa'));

// var_dump(strcmp("Hello, world", "Hello"));

// var_dump(strcmp("Hella","HellA"));

// $res = strcmp('5', 5);
// $res = strcmp("15", 0xF);
// $res = strcmp(61529519452809720693702583126814, 61529519452809720000000000000000);
// var_dump($res);

// how strcmp works

$str1 = 'b';
// echo ord($str1), "\n";

$str2 = 't';
// echo ord($str2), "\n";

// var_dump(strcmp($str1, $str2));

$str1 = "bear";
$str2 = "tear";
// echo ord($str1), "\n";
// echo ord($str2), "\n";
// var_dump(strcmp($str1, $str2));


$str1 = "b";
// echo ord($str1); //98
// echo "\n";
$str2 = "t";
// echo ord($str2); //116
// echo "\n";
// echo ord($str1)-ord($str2) , "\n";//-18
$str1 = "bear";
$str2 = "tear";
$str3 = "";

echo strcmp($str1, $str2); // -1
echo "\n";

echo strcmp($str2, $str1); //1
echo "\n";

echo strcmp($str2, $str2); //0
echo "\n";

echo strcmp($str2, $str3); //4
echo "\n";

echo strcmp($str3, $str2); //-4
echo "\n";
echo strcmp($str3, $str3); // 0

echo "\n";

echo strncmp($str3, $str2, 1), "\n"; //-4
