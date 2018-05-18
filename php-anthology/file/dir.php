<?php

//

$dir = '/home/zhaojun/www/admin/';

$dp = opendir($dir);

while ($entry = readdir($dp)) {
    if (is_dir($entry)) {

    }

}

closedir($dp);