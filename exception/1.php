<?php

// An exception can be thrown, and caught within php
// 
// exception code can be surround in try block, to catch potential exceptions
//
// throw object must be an instance of class or subclass of Exception

// $exception = new Exception("aaa", 100);

/* throw (new stdClass()); // non Exception instance will trigger faltal error */

// var_dump($exception);

// multiple catch blocks can be used to catch different classes of exceptions
// when an exception is thrown, code following the statement will not be executed

// 异常是 Exception 类的对象，在遇到无法修复的状况时抛出
// 出现问题的时候异常用于主动出击，委托职责；异常还可以用于防守，预测潜在的问题来减轻影响。
//
//

    // 捕获异常只会允许其中一个catch块

try {
    $pdo = new PDO('mysql://host=wrong_host;dbname=wrong_name');
} catch (PDOException $e) {
    $code = $e->getCode();
    $msg  = $e->getMessage();

    echo 'pdo exception:' . $msg;
} catch (Exception $e) {
    echo 'general exception' . $e->getMessage();
} finally {
    echo "\nalways\n";
}

