<?php

class FtpConnector
{

    private $_ftpHost;

    private $_ftpPort;

    private $_targetDir;

    private $_connTimeout;

    private $_resource;

    function __construct($host, $port = 21, $dir = '/', $timeOut = 0)
    {
        if (empty($host)) {
            throw new Exception('please specify the remote ftp server');
        }
        $this->_ftpHost = $host;
        $this->_ftpPort = $port;
        $this->_targetDir = $dir;
        $this->_connTimeout = $timeOut;
    }

    public function ftpConnect()
    {
        try {
            $fp = ftp_connect($host, $this->_ftpPort, $this->_connTimeout);
            if (!$fp) {
                throw new Exception('failed to connect to ftp ' . $this->_ftpHost);
            }
            $this->_resource = &$fp;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function ftpLogin()
    {

    }
}


$ftpConn = new FtpConnector('172.17.0.2', null, null, 10);

var_dump($ftpConn);