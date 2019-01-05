<?php

// magic quotes helps to prevent security breaches,
// it adds escape query strings, form posts, and cookie data automatically before
// accessing these data
//
//

// 在magic_quotes_gpc=On的情况下，如果输入的数据有

// 单引号（’）、双引号（”）、反斜线（）与 NUL（NULL 字符）等字符都会被加上反斜线。
// 这些转义是必须的，如果这个选项为off，那么我们就必须调用addslashes这个函数来为字符串增加转义。

// 正是因为这个选项必须为On，但是又让用户进行配置的矛盾，在PHP6中删除了这个选项，
// 一切的编程都需要在magic_quotes_gpc=Off下进行了。在这样的环境下如果不对用户的数据进行转义，
// 后果不仅仅是程序错误而已了。同样的会引起数据库被注入攻击的危险。

// var_dump(ini_get('register_globals'));

// var_dump(ini_get('magic_quotes_gpc'));

$_GET['name'] = "o'reilly";
$_GET['address'] = "o'reilly'chengdu";

// var_dump(get_magic_quotes_gpc());

if (!get_magic_quotes_gpc()) {
    $get = array_map('addslashes', $_GET);

}

var_dump($get);