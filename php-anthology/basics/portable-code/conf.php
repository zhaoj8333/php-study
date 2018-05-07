<?php

/**
 *  As a general rule, try to keep the majority of this information in a single
 *  place—maybe even a single file—so that when the information needs to be modified,
 *  you can do it all in the one place. That said, when building modular applications,
 *  you may want to store elements of the configuration that are local to a specific
 *   “module” with the module itself,rather than centrally.
 *
 * xml
 * ini
 *
 * place all settings in a single file as PHP constants
 */


define('DOMAIN', 'www.deepin.com');

// echo DOMAIN;


// Constants need to be used with caution
// To make your functions and classes reusable in other applications,
// they shouldn’t depend on constants of a fixed name;
// rather, they should accept configuration information as arguments.

// put hte configuration file out side the web directories;
//


// keep short_open_tags and asp_tags both off
// not mixed with xml files
//
//


// register_globals off
// 当register_globals=Off的时候，下一个程序接收的时候应该用
// $_GET['user_name']和$_GET['user_pass']来接受传递过来的值。（注：当<form>
// 的method属性为post的时候应该用$_POST['user_name']和$_POST['user_pass']）

// 当register_globals=On的时候，下一个程序可以直接使用$user_name和$user_pass来接受值。
// 顾名思义，register_globals的意思就是注册为全局变量，所以当On的时候，传递过来的值会被直接
// 的注册为全局变量直接使用，而Off的时候，我们需要到特定的数组里去得到它。


// register_globals is shut down after php-5.6
// this can avoid conflict conflict with variables you’ve created in your script
