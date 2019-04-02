<?php

/**
 * @Author: zhaojun_cd
 * @Date:   2018-06-07 17:58:28
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-06-07 18:00:57
 */

require '../inc.php';

$fp = fopen($file, 'a');

$nbLock = flock($fp, LOCK_EX);

if ($nbLock) {
    fwrite($fp, "HELLO, WORLD \n");

    sleep(10);

    fwrite($fp, "hello, php \n");

    flock($fp, LOCK_UN);
}

fclose($fp);