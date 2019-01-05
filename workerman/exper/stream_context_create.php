<?php

$data = array(
    'foo'=>'bar', 
    'baz'=>'boom', 
    'site'=>'www.lai18.com', 
    'name'=>'lai18',
); 
    
$data = http_build_query($data); 

//$postdata = http_build_query($data);
$options = array(
    'http' => array(
        'method' => 'POST',
        'header' => 'Content-type:application/x-www-form-urlencoded',
        'content' => $data,
        'timeout' => 60 * 60 // 超时时间（单位:s）
    )
);

$url = "http://www.lai18.net";
$context = stream_context_create($options);
var_dump($context);die;
$result = file_get_contents($url, false, $context);
var_dump($result);die; 
