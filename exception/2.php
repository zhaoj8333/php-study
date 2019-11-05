<?php

function myException($exception)
{
    echo "Exception: ", $exception->getMessage();
    exit();
}

// 使用set_exceptoin_handler未能捕获到错误
// set_exception_handler('myException');

try {
    1/0;
} catch (Exception $exception) {

    echo "Exception: ", $exception->getMessage();
} catch (Throwable $e) {
    echo "Exception: ", $exception->getMessage();
}
