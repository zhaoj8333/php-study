<?php

// header('Access-Control-Allow-Origin:*');
// header('Access-Control-Allow-Methods:POST,GET');
// header('Access-Control-Allow-Headers:x-requested-with,content-type');

// echo "http://mm." . mt_rand(1, 20) . '.jpg';

$arr = [
    'name' => 'abc',
    'age'  => 30,
];

header('Content-type:application/json');


// if (isset($_GET['callback'])) {
//     $res = json_encode($arr);

//     $res = $_GET['callback'] . "($res)";
//     echo $res;
//     // var_dump($res);die;
//     // echo '{\'' . $_GET['callback'] . '\':' . json_encode($arr) . '}';
// }
// //

//  dom xss

