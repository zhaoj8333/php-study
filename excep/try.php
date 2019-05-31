<?php

$num = 0;
try {
    echo 1/$num;
} catch (Exception $e) {
    echo $e->getMessage();
}


// PHP中什么是错误：
// 属于php脚本自身的问题，大部分情况是由错误的语法，服务器环境导致，使得编译器无法通过检查，甚至无法运行的情况。
// warning、notice都是错误，只是他们的级别不同而已，并且错误是不能被try-catch捕获的。

// 在PHP中任何自身的错误或者是非正常的代码都会当做错误对待，并不会以异常的形式抛出
