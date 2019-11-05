#!/usr/local/php72/bin/php
<?php
// readfile("php://filter/resource=http://www.baidu.com");

// readfile("php://filter/read=string.toupper/resource=http://127.0.0.1/");
// readfile("php://filter/read=string.rot13/resource=http://127.0.0.1/");
//

/* file_put_contents("php://filter/write=string.rot13/resource=hello.txt", "hello"); */

/* /1* file_put_contents('php://memory', 'PHP'); *1/ */
/* /1* echo file_get_contents('php://memory', 'PHP'); *1/ */
/* $file = "php://memory"; */
/* $file = "aaa"; */

/* $mem = fopen($file, 'r+'); */
/* $res = fwrite($mem, str_repeat("memory", 10)); */
/* //fputs($mem, str_repeat("memory", 10)); */
/* // var_dump($res); */
/* /1* var_dump(file_get_contents("php://memory")); *1/ */
/* // rewind the position of a file pointer */
/* rewind($mem); */
/* $cont = fread($mem, 60); */
/* //$cont = stream_get_contents($mem); */
/* var_dump($cont); */
/* fclose($mem); */
