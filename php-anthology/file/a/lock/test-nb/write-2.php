<?php

/**
 * @Author: zhaojun_cd
 * @Date:   2018-06-07 17:58:40
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-06-07 18:01:49
 */

require '../inc.php';

$fp = fopen($file, 'a');

if (flock($fp, LOCK_EX | LOCK_NB)){            // 取得独占锁
    fwrite($fp, "How Are You\r\n");         // 写入数据
    fwrite($fp, "Show Me The Money\r\n");   // 写入数据

    flock($fp, LOCK_UN);                    // 解锁
} else {
    echo 'file locked';
}

fclose($fp);