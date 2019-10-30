<?php

$arr = array (
  'allreport' => 
  array (
    0 => 'get',
    1 => 'delete',
  ),
  'index' => 
  array (
    0 => 'post',
    1 => 'get',
  ),
);

$route = [];

foreach($arr as $key => $val) {
    //var_dump($val);
    if (!is_array($val)) {
        echo 1111;
    }
    foreach ($val as $v) {
        $route[] = $key . '/' . $v;
    }
}

var_dumP($route);
