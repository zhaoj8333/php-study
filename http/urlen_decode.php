<?php

// $url = "https://www.baidu.com?keyword=123&keytype=user";
// 
// var_dump($url, urlencode($url));


$uri['scheme'] = 'https://';
$uri['domain'] = 'www.baidu.com/';

$uri['scheme'] = 'http://';
$uri['domain'] = 'localhost/www/php-study/http/urlen_decode.php';

$uri['params'] = "?wd=%E6%92%92%E5%A8%87&rsv_spt=1&rsv_iqid=0xbc06a6f00008696e&issp=1&f=8&rsv_bp=1&rsv_idx=2&ie=utf-8&rqlang=cn&tn=baiduhome_pg&rsv_enter=1&oq=12%2526lt%253B1jlk&inputT=1649&rsv_t=5180ihK273uIvHsCAmu8wduUv3kkb%2BQWoFtGsl6Ci9shSz75csR%2FEVsGI%2BCRwrTWAZjr&rsv_pq=ba26bda2000786ab&rsv_sug3=17&rsv_sug1=5&rsv_sug7=100&rsv_sug2=0&rsv_sug4=1649";


echo($uri['scheme'] . $uri['domain'] . $uri['params']);


var_dump($_GET);
