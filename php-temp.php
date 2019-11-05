<?php

$set= setlocale(LC_ALL, ['zh_CN.UTF-8', 'zn_CN.gbk', 'zn_CN.gb2312', 'zh_CN.gb18030']);
// var_dump($set);

// if (strtolower($_SERVER['CONTENT_TYPE']) == 'application/csv') {
    $input = fopen("php://input", 'r');
    $temp  = fopen("php://temp/maxmemory:0", 'r+');
    //var_dump(stream_get_contents($input));die;
    //var_dump($input, $temp);die;

    while ($buffer = fread($input, 1024)) {
        // var_dump($buffer);
        fwrite($temp, $buffer);
    }
    
    fclose($input);

    rewind($temp); // 指针移动到文件头
    // var_dump($temp);
    $data = fgetcsv($temp);
    // var_dump($data);
    while ($data = fgetcsv($temp)) {
        var_dump($data);
    }
//}
