<?php

/**
 * @Author: zhaojun_cd
 * @Date:   2018-06-07 16:28:24
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-06-07 17:49:17
 */

require '../inc.php';

$fp = fopen($file, 'r');

$shLock = flock($fp, LOCK_SH);

if ($shLock) {
    while (!feof($fp)) {
        echo fread($fp, 100);
    }
    flock($fp, LOCK_UN);
}

fclose($fp);