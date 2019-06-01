<?php

$i = 0;
function stackTest($i)
{
    $i ++;
    stackTest($i);
}
