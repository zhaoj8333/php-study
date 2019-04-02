<?php

/**
 * @Author: zhaojun_cd
 * @Date:   2018-06-07 16:38:29
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-06-07 18:09:00
 */

$file = '/home/zhaojun/dumps/MySQL.txt';

// 使用共享锁LOCK_SH，如果是读取，不需要等待，但如果是写入，需要等待读取完成。
// 使用独占锁LOCK_EX，无论写入/读取都需要等待。
// LOCK_UN，无论使用共享/读占锁，使用完后需要解锁。
// LOCK_NB，当被锁定时，不阻塞，而是提示锁定。