<?php

declare(strict_types = 1);

$a = (int)"2 abc";

$b = (integer)"3 xyz";

// var_dump($a, $b);


function getId(): int
{
    $id = 123;

    return $id;
}

// var_dump(getId());
//
$i = '13';
function testme(int $j) {
    var_dump($j);
}

testme(intval($i));
