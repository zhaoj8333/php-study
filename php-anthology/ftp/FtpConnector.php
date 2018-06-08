<?php
/**
 * FtpConnector : connect and login to remote ftp server
 *
 * @author zhaojun
 */
class FtpConnector
{
    const DEFAULT_FTP_PORT = 21;

    const DEFAULT_FTP_DIR  = '/';

    const DEFAULT_FTP_TIMEOUT = 5;

    private $_ftpHost;

    private $_ftpPort;

    private $_targetDir;

    private $_timeOut;

    private $_ftpUser;

    private $_ftpPasswd;

    private static $_resource;


    /**
     * [__construct description]
     *
     * @author zhaojun
     * @datetime 2018-06-05T09:48:22+0800
     *
     * @param $config array config of the ftp server
     *
     * @return [void]
     */
    private function __construct($config)
    {
        $this->_ftpHost   = $config['host'];
        $this->_ftpPort   = isset($config['port']) ? $config['port'] : self::DEFAULT_FTP_PORT;
        $this->_targetDir = isset($config['dir'])  ? $config['dir']  : self::DEFAULT_FTP_DIR;
        $this->_timeOut   = isset($config['timeout']) ? $config['timeout'] : SELF::DEFAULT_FTP_TIMEOUT;
        $this->_ftpUser   = $config['user'];
        $this->_ftpPasswd = $config['password'];
    }

    /**
     * [__clone avoid this class to be cloned]
     *
     * @author zhaojun
     * @datetime 2018-06-07T09:23:44+0800
     *
     * @return [void]
     */
    private function __clone()
    {
    }

    /**
     * [connect connect and login to the ftp server]
     *
     * @author zhaojun
     * @datetime 2018-06-05T09:51:24+0800
     *
     * @throws [Exception]
     *
     * @return [void]
     */
    private function connect()
    {
        try {
            $fp = ftp_connect(
                $this->_ftpHost,
                $this->_ftpPort,
                $this->_timeOut
            );
            if (!$fp) {
                throw new Exception('failed to connect to ftp ' . $this->_ftpHost);
            }
            self::$_resource = &$fp;
        } catch (Exception $e) {
            throw new Exception(
                $e->getMessage(),
                $e->getCode()
            );
        }
    }

    /**
     * [login login to ftp-server]
     *
     * @author zhaojun
     * @datetime 2018-06-05T10:02:44+0800
     *
     * @throws [Exception]
     *
     * @return [resource]
     */
    private function login()
    {
        try {
            $login = ftp_login(
                self::$_resource,
                $this->_ftpUser,
                $this->_ftpPasswd
            );
            if (!$login) {
                throw new Exception('failed to login to the ftp-server: ' . $this->_ftpHost);
            }
        } catch (Exception $e) {
            throw new Exception(
                $e->getMessage(),
                $e->getCode()
            );
        }
    }

    /**
     * [ftpInit initialize this class]
     *
     * @author zhaojun
     * @datetime 2018-06-07T09:20:16+0800
     *
     * @return
     *
     */
    public static function ftpInit(array $config)
    {
        if (null != self::$_resource) {
            return self::$_resource;
        }
        if (!isset($config['host']) ||  empty($config['host'])) {
            throw new Exception('please specify the host of ftp server');
        }
        if (!isset($config['user']) ||  empty($config['user'])) {
            throw new Exception('please specify the user of ftp server');
        }
        if (!isset($config['password']) ||  empty($config['password'])) {
            throw new Exception('please specify the password of ftp server');
        }

        $ftpInstance = new self($config);

        $ftpInstance->connect();
        $ftpInstance->login();

        return self::$_resource;
    }
}
