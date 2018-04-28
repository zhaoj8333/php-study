<?php
$a = 3; $b = 5;
// echo $a . " " . $b;
// echo "\n";
if ($a = 5 || $b = 7) {
    // var_dump($a);
    // var_dump(++$a);
    // var_dump($a++);
    // var_dump($b++);
    ++$a;
    $b++;
}

echo $a . " " . $b . "\n";
//

$temp = true;
var_dump(++$temp);
var_dump($temp);
// echo $temp;
// $c = $a++;
// var_dump($a);