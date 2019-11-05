<?php

/* error_reporting(0); */
/* ini_set('display_errors', false); */
/* echo 'no semicolon operator' */

/* error_reporting(E_ALL); */
/* set_error_handler( */
/*     function ($errno, $errstr, $errfile, $errline) {}, */
/*     E_ALL | E_STRICT */
/* ); */
/* echo 'no semicolon' */

// 如果错误发生在脚本执行之前（比如文件上传时），将不会调用自定义的错误处理程序因为它尚未在那时注册。
//  set_error_handler 是用来自定义用户级错误 E_USER_ERROR & E_USER_WARNING & E_USER_NOTICE & E_USER_DEPRECATED 和 
//  部分运行时系统错误 E_WARING & E_NOTICE & E_DEPRECATED 的捕获器，
//  即语法解析错误 E_PARSE (Parse Error) 是无法用其捕获到的。

// 1、php 在解释运行用户代码时，会以主脚本为载入点，Zend Engine 首先对其进行语法解析（Parse），
//    这里一定要理解，Zend Engine 此时是对脚本的语法进行解析，脚本中的任何 ini 设置都对其无效
//    （还没解释载入执行初始化）,所以你设置的什么 error_reporting, display_errors, set_error_handler。
//    只有当语法解析无误，Zend Engine 开始载入并解释脚本，脚本里的一些参数设置项才会开始生效。
// 2、php 没有 //链接依赖库 -- 编译 -- 运行// 一说。
//    当 php 在主脚本中 “引入依赖” 时，Zend Engine 并不会在对主脚本做语法解析时将其 “依赖” 也载入解析。
//    Zend Engine 只会对当前的主脚本做语法解析，在解析通过后，便开始解释执行用户代码，
//    即便 “依赖” 中有 Parse Error，那也得等到真的执行到载入命令时才会加载解析-解释-运行。
//    \

// error_reporting(E_ALL);     // 解析后，执行时设置执行环境错误级别
error_reporting(0);     // 设置为0时，加载lib文件后，lib.php中的语法错误不会被报告出来

echo "this is main script" . PHP_EOL;

require __DIR__ . '/lib.php';   // 解析时不会对lib.php做语法解析检查,运行时加载该脚本执行 解析- 解释 - 运行流程
// lib.php 解析/解释运行时已经是在我们自定义好错误告警级别的上下文中了
// Zend Engine 会根据我们设定的错误告警级别对 lib.php 进行载入
// 也就是， E_PARSE & E_ERROR 错误可被用户设定

echo "hello world!" . PHP_EOL;  // lib.php 被解析 - 解释完成后才会执行
