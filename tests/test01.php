<?php

  // [2, 30, 31, 9, 123]
  // 安抚

$url = 'http://dev-wireless-43.xiaozhu.com/app/xzfk/android/4.15.2/global/appShadePageInfo?_=1538292807174&deviceState=hadLoginBefore&dispathChannel=xiaozhu&uniqueId=862989031768782&xzsign=md5_76a3f12c0697150b7da8e8c2443070c9';
for ($i = 0; $i <= 10000; $i++) {
    $content = file_get_contents($url);

    echo $i, "\n";
    var_dump($content);
}
