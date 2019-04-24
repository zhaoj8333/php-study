<?php

// var_dump($_COOKIE);

// $_COOKIE['name'] = 'cookie-test';
// var_dump($_COOKIE);

// setcookie('test', 'test' . time());
// ob_start();
// var_dump($_COOKIE);

// setcookie('test', 'cookie-value', time() + 5, '/', 'php-study.com');
// var_dump($_COOKIE);


header('Set-Cookie: test=cookie-value; expires=Wed, 24-Apr-2019 18:17:05 GMT; path=/security; domain=www.php-study.com');

var_dump($_COOKIE);die;
