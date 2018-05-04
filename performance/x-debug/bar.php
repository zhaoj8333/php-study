<?php

function bar($arr)
{
    for ($i = 0; $i < count($arr); $i++) {
        if (isInt($arr[$i])) {

            echo 10 * $arr[$i] , "\n";
        }
    }
}

function isInt($value)
{
    if (is_int($value)) {
        return true;
    } else {
        return false;
    }
}

$ints = [1, 2, 3, 'a', 12, 'T', '0'];
$ints1 = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 0];

bar($ints);

bar($ints1);

echo "done";