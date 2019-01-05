<?php

// stream_context_create Creates a stream context

// var_dump(stream_context_create());
// stream_context_create 模拟post请求

$data = [
    'foo'=>'bar',
    'baz'=>'boom',
    'site'=>'www.lai18.com',
    'name'=>'lai18'
];

$data = http_build_query($data);
// var_dump($data);

$options = [
    'http' => [
        'method' => 'POST',
        'header' => 'Content-type:application/x-www-form-urlencoded',
        'content' => $data
    ],
];

$url = 'http://127.0.0.1/www/php-study/php-anthology/resource/post_receive.php';

$context = stream_context_create($options);

// $result = file_get_contents($url, false, $context);

// echo($result);


########################################

// $fp = fopen($url, 'r', false, $context);
// var_dump($fp);
// 
// fpassthru($fp);
// fclose($fp);
