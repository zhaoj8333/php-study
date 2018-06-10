<?php

/**
 * @Author: zhaojun_cd
 * @Date:   2018-06-08 10:17:55
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-06-08 10:31:11
 */

class FtpServer
{
    protected $ftpConn;

    public function __construct()
    {
        require 'FtpConnector.php';
        $config = require 'config.php';

        $this->ftpConn = FtpConnector::ftpInit($config);
    }

    public function getServerInfo()
    {
        $ftp = [];

        $ftp['os'] = ftp_systype($this->ftpConn);

        return $ftp;
    }
}

// $srv = new FtpServer();

// var_dump($srv->getServerInfo());