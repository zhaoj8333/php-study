<?php

/**
 * Yaf 入口文件
 *
 * PHP version 7.2
 *
 * @category PHP
 * @package  PHP
 * @author   赵俊 <zhaojun_cd@g7.com.cn>
 * @license  http://www.laruence.com/manual License
 * @version  GIT: gerrit
 * @link     https://gsp2.chinawayltd.com
 */

use \Yaf\Application;

define("APP_PATH", realpath(dirname(dirname(__FILE__))));

$app = new Application(APP_PATH . "/conf/app.ini");
$app->run();
