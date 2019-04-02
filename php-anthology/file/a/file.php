<?php

header("Content-type: text/html; charset=gb2312");

// look for “holes” in your logic that might
// allow unwanted access to your files
//
// Be particularly careful when allowing files and directories to
// be identified via URLs, or uploaded or downloaded from your site.
//
//

// file

$file = '/home/zhaojun/dumps/MySQL.html';

// $content = file($file);
// $content = file_get_contents($file);
// $content = readfile($file);

// var_dump($content);


// read file and save memory

// $fp = fopen($file, 'r');

// while (!feof($fp)) {
//     $chunk = fgets($fp); // read file line by line
//     var_dump($chunk);
// }

// fclose($fp);

// for (;;!feof($fp)) {
//     $chunk = fgets($fp);
//     if (feof($fp)) {
//         exit;
//     }
//     var_dump($chunk);
// }

// $lines = file($file);

// $fp = fopen('/home/zhaojun/dumps/MySQL.txt', 'w');
// foreach ($lines as $line) {
//     $line = strip_tags($line);
//     fwrite($fp, $line);
// }

// echo file_get_contents($file);
// echo file_get_contents('/home/zhaojun/dumps/MySQL.txt');
//


// fsockopen
$fileUrl = 'https://www.csdn.net/api/articles?type=more&category=home&shown_offset=0&type=more&category=home&shown_offset=0';

$fileUrl = 'https://www.baidu.com';

// var_dump(file_get_contents($fileUrl));die;


// fopen doesn’t handle well the sorts problems that you’d typically
// encounter on the Internet, such as time-outs, and it fails to
// provide the detailed error reporting that you
// may need for remote connections. It also strips off the HTTP
// response headers sent by the remote Web server
// $fp = fopen($fileUrl, 'r');

// while (!feof($fp)) {
//     var_dump(fgets($fp));
// }

// fclose($fp);


// fsockopen
//
// $host = 'https://www.csdn.net';
// $port = '80';
// $timeout = 10;
// $uri = '/api/articles?type=more&category=home&shown_offset=0&type=more&category=home&shown_offset=0';
// $fp = @fsockopen($host, $port, $errNo, $errMsg, $timeout);

// if (!$fp) {

// }
// var_dump($errNo, $errMsg);


// $host = 'www.jb51.net';

// $page = '/article/93365.htm';

// $fp = fsockopen("$host", 80, $errNO, $errStr);

// if (!$fp) {
//     die('could not connect to ' . $host);
// }

// $request = "GET $page HTTP/1.0\r\n";
// $request .= "Host:$host \r\n";
// $request .= "Referer:$host$page\r\n";
// $request .= "User-Agent: PHP test client \r\n";

// $res = [];

// $send = fwrite($fp, $request);

// while (!feof($fp)) {
//     $res[] = fgets($fp);
// }

// fclose($fp);


// var_dump($res);
// //


// var_dump(file_get_contents('http://www.jb51.net/'));
//

$url = 'http://www.jb51.net/';
// $ch = curl_init();
// $timeout = 5;
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

// $content = curl_exec($ch);
// curl_close($ch);

// var_dump($content);


$handle = fopen($url, 'rb');

$contents = '';

do {
    $data = fread($handle, 8192);
    if (strlen($data) == 0) {
        break;
    }
    $contents .= $data;
} while (true);

fclose($handle);

echo($contents);

