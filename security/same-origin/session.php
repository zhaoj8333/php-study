<?php

session_start();

$_SESSION['name'] = 'test';
// var_dump(session_id());
// var_dump($_SESSION);
//
//
$_SESSION['arr'] = ['a', 'b', 'c'];
$_SESSION['obj'] = new stdClass();


// header('Set-Cookie: test=cookie-value; expires=Wed, 24-Apr-2019 18:18:05 GMT; Max-Age=5; path=/security; domain=php-study.com');
setcookie('time', 'test' . time(), time() + 1000, 'php-study.com', '', true, true);
var_dump($_SESSION);
var_dump($_COOKIE);
