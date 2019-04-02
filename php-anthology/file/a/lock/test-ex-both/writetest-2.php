<?php

/**
 * @Author: zhaojun_cd
 * @Date:   2018-06-07 16:28:24
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-06-07 18:08:17
 */

require '../inc.php';

$fp = fopen($file, 'wa');

$exLock = flock($fp, LOCK_EX);

if ($exLock) {

        fwrite($fp, "lock_ex testing - 1 \n");

        sleep(10);

        fwrite($fp, "lock_ex testing - 2 \n");

        flock($fp, LOCK_UN);
}

fclose($fp);


// A,B都使用独占锁写文件，阻塞