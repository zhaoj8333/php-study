<?php

/**
 * @Author: zhaojun_cd
 * @Date:   2018-06-07 16:28:24
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-06-07 18:05:59
 */

require '../inc.php';

$fp = fopen($file, 'aw');

$exLock = flock($fp, LOCK_EX);

if ($exLock) {
    while (true) {
        $res = fwrite($fp, "lock_ex testing - 1 \n");
var_dump($res);
        // sleep(10);

        fwrite($fp, "lock_ex testing - 2 \n");

        flock($fp, LOCK_UN);
    }
}

fclose($fp);


// a取得独占锁，b只能等待，等a执行完解除锁定后才能执行b，阻塞