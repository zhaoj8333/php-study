<?php

/**
 * @Author: zhaojun_cd
 * @Date:   2018-06-07 16:38:13
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-06-07 18:08:36
 */

require '../inc.php';


$fp = fopen($file, 'wa');

$exLock = flock($fp, LOCK_EX);

if ($exLock) {
    $res = fwrite($fp, "lock_ex testing - 1 \n");
// var_dump($res);
    // sleep(10);

    fwrite($fp, "lock_ex testing - 2 \n");

    flock($fp, LOCK_UN);
}

fclose($fp);
