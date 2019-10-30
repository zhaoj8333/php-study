<?php

$money = 450;

function getMoney($money)
{
    if ($money <= 0) {
        echo "no money";
    }
    return $money;
}

getMoney($money);
