<?php

// php大小写不敏感问题
//

// 1. 变量名区分大小写
//
/* var_dump($_GET, $_POST, $_REQUEST, $_COOKIE, $_SESSION, $GLOBALS, $_SERVER, $_FILES, $_ENV); */

/* $abc = 'abc'; */
/* var_dump($abc); */
/* var_dump($aBc); */

/* define('ABC', 'hello, abc'); */

/* echo ABC; */
/* echo abc; */

// ini配置项区分大小写
/* var_dump(ini_get('file_Uploads')); // false */
/* var_dump(ini_get('file_uploads')); // 1 */

// 不敏感
//
function show()
{
    echo 'hello, world', "\n";
}

/* /1* show(); *1/ */
/* shoW(); */

class Test
{
    public static function testTest()
    {
        echo '/Test/test';
    }
}

/* Test::testTest(); */
/* Test::testtest(); */
/* TEST::testtest(); */

/* var_dump(__LINE__, __FILE__, __DIR__, __FUNCTION__, __CLASS__, __METHOD__, __NAMESPACE__); */
/* echo "\n"; */
/* var_dump(__LiNE__, __FiLE__, __DiR__, __FuNCTION__, __ClASS__, __MEtHOD__, __NAmESPACE__); */

/* $a = null; */
/* $b = NULL; */
/* $c = true; */
/* $d = TRUE; */
/* $e = false; */
/* $f = FALSE; */
/* var_dump($a === $b); */
/* var_dump($c === $d); */
/* var_dump($e === $f); */

/* // 强制类型转换 */
/* // */
/* $a = 1; */
/* var_dump($a); */
/* var_dump((STRING)$a); */
/* var_dump((bool)$a); */
/* var_dump((boolean)$a); */
/* var_dump((Bool)$a); */










