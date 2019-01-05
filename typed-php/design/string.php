<?php

// addslashes — 使用反斜线引用字符串: ',",\,null字符
// 

// 一个使用 addslashes() 的例子是当你要往数据库中输入数据时。 
// 例如，将名字 O'reilly 插入到数据库中，这就需要对其进行转义。 
// 强烈建议使用 DBMS 指定的转义函数 （比如 MySQL 是 mysqli_real_escape_string()，
// PostgreSQL 是 pg_escape_string()），但是如果你使用的 DBMS 没有一个转义函数，并且使用 \ 来转义特殊字符，你可以使用这个函数。 
// 仅仅是为了获取插入数据库的数据，额外的 \ 并不会插入。 
// 当 PHP 指令 magic_quotes_sybase 被设置成 on 时，意味着插入 ' 时将使用 ' 进行转义。

// PHP 5.4 之前 PHP 指令 magic_quotes_gpc 默认是 on， 
// 实际上所有的 GET、POST 和 COOKIE 数据都用被 addslashes() 了。 
// 不要对已经被 magic_quotes_gpc 转义过的字符串使用 addslashes()，因为这样会导致双层转义。 
// 遇到这种情况时可以使用函数 get_magic_quotes_gpc() 进行检测。


// 尝试在运行时设置 magic_quotes_gpc 将不会生效

$mqs = get_magic_quotes_gpc();

// var_dump($_GET);

if (!$mqs and !empty($_GET)) {
    foreach ($_GET as $key => $get) {
        // var_dump(htmlentities($get));

        // $quoted = addslashes($get);
        // var_dump($key . '-> 1 -> ' . $quoted);
        // var_dump($key . '-> 2 -> ' . addslashes($quoted));
    }
}


// chop: rtrim
//
$str = ' aaa bbb';
$str = ' aaa bbb ';
$str = ' aaa bbb c';


$str = "aa\tbbb\t";
$str = "aa\nbbb\n";
$str = "aa\rbbb\r";
$str = "aa\0bbb\0";
$str = "aa\x0Bbbb\x0B";

// var_dump(0x0b);

// var_dump($str);
// // var_dump(chop($str, 'c'));
// var_dump(chop($str));


// chr
$ord = 27;
$ord = 60;
$ord = 66;

// var_dump(chr($ord));
// var_dump(sprintf("%c", $ord));


// chunk_split: 将字符串分割成小块

$chunk = 'aaa bbb ccc';
$chunk = '将字符串分割成小块';

// $base64 = base64_encode($chunk);

// var_dump($chunk);
// var_dump(chunk_split($chunk, 11, "\r\n")); // not multibyte safe
