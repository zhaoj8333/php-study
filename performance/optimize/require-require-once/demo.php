<?php

$a = set_include_path('/tmp/:/home/www/php-study/hhvm/');

include_once('demo01.php');

// $includedFiles = get_included_files();
// var_dump($includedFiles);

// $requiredFiles = get_required_files();
// var_dump($requiredFiles);
// 当PHP看到include_once “2.php”的时候, 他并不知道这个文件的实际路径是什么,
//  也就无法从已加载的文件列表去判断是否已经加载, 所以在include_once的实现中,
//   会首先尝试解析这个文件的真实路径


// $cwd = getcwd();
// var_dump($cwd);
//
// 1. 尝试解析文件的绝对路径, 如果能解析成功, 则检查EG(included_files), 存在则返回, 不存在继续
// 2. 打开文件, 得到文件的打开路径(opened path)
// 3. 拿opened path去EG(included_files)查找, 是否存在, 如果存在则返回, 不存在继续
// 4. 编译文件(compile_file)