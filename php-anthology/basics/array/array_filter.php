<?php

/**
 * @Author: zhaojun_cd
 * @Date:   2018-08-04 18:20:49
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-08-04 18:23:00
 */

require 'arr.php';

function odd($val)
{
    return $val & 1;
}

function even($val)
{
    return !($val & 1);
}

print_r(array_filter($nums, 'odd'));