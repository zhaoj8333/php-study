<?php

class MySqliConnector
{

    const DEFAULT_MYSQL_PORT = 3306;
    const DEFAULT_MYSQL_CHARSET = 'utf8';

    protected $_dbHost;
    protected $_dbPort;
    protected $_dbUser;
    protected $_dbPwd;
    protected $_dbName;
    protected $_dbCharset;

    const DB_CONF_FILE = 'dbconf.php';
    const MYSQLI_CONNECT_TIMEOUT = 10;

    private static $_mysqliObj;
    private static $_mysqliConn;

    public $mysqliConnectErrorno = 0;
    public $mysqliConnectError = '';

    public $mysqliRealConnectErrorno = 0;
    public $mysqliRealConnectError = '';

    /**
     * [__construct 构造函数]
     *
     * @param string $dbKey [数据库配置信息]
     */
    private function __construct($dbKey, $config)
    {
        $isConfigValid = isset(
            $config[$dbKey]['host'],
            $config[$dbKey]['user'],
            $config[$dbKey]['pwd'],
            $config[$dbKey]['dbname']
        );
        if (!$isConfigValid) {
            self::getDbException('please specify the server host, user, pwd, dbname !');
        }
        $this->_dbHost    = $config[$dbKey]['host'];
        $this->_dbUser    = $config[$dbKey]['user'];
        $this->_dbPwd     = $config[$dbKey]['pwd'];
        $this->_dbName    = $config[$dbKey]['dbname'];
        $this->_dbPort    = isset($config[$dbKey]['dbport']) ? $config[$dbKey]['dbport'] : self::DEFAULT_MYSQL_PORT;
        $this->_dbCharset = isset($config[$dbKey]['charset']) ? $config[$dbKey]['charset'] : self::DEFAULT_MYSQL_CHARSET;

        $this->connect();
        // $this->realConnect();
    }

    /**
     * [__clone 防止克隆对象, 设为private]
     *
     * @return [void]
     */
    private function __clone()
    {

    }

    /**
     * [getInstance 获取mysqli实例, 单例]
     *
     * @param  array $config [配置信息]
     *
     * @return object [mysqli 实例]
     */
    public static function getInstance($dbKey = '')
    {
        $dbObj = new stdClass();

        if (empty($dbKey)) {
            self::getDbException('please specify the database config information !');
        }
        $config = include self::DB_CONF_FILE;

        if (!isset($config[$dbKey])) {
            self::getDbException('no such database config information specified !');
        }

        if (!self::$_mysqliConn instanceof self) {
            self::$_mysqliConn = new self($dbKey, $config);
        }
        $dbObj->mysqliConn = self::$_mysqliConn;
        $dbObj->mysqli     = self::$_mysqliObj;
        return $dbObj;
    }

    /**
     * [connect 连接数据库]
     *
     * @return void 连接数据库
     */
    public function connect()
    {
        try {
            self::$_mysqliObj = new Mysqli(
                $this->_dbHost,
                $this->_dbUser,
                $this->_dbPwd,
                $this->_dbName,
                $this->_dbPort
            );
            if (self::$_mysqliObj->connect_errno) {
                $this->mysqliConnectErrorno = self::$_mysqliObj->connect_errno;
                $this->mysqliConnectError = self::$_mysqliObj->connect_error;
                self::getDbException(
                    'Faild to connect to MySQL: ( ' .
                    $this->mysqliConnectErrorno . " ) " .
                    $this->mysqliConnectError
                );
            }
            self::$_mysqliObj->set_charset($this->_dbCharset);
        } catch (Exception $e) {
            exit($e->getMessage());
        }
    }

    /**
     * [realConnect real_connect ]
     *
     * @return void [建立一个real_connect]
     */
    public function realConnect()
    {
        try {
            self::$_mysqliObj = mysqli_init();
            if (!self::$_mysqliObj) {
                self::getDbException('mysqli init failed !');
            }
            if (!self::$_mysqliObj->options(MYSQLI_INIT_COMMAND, 'SET AUTOCOMMIT = 0')) {
                self::getDbException('setting MYSQLI_INIT_COMMAND failed !');
            }
            if (!self::$_mysqliObj->options(MYSQLI_OPT_CONNECT_TIMEOUT, self::MYSQLI_CONNECT_TIMEOUT)) {
                self::getDbException('setting MYSQLI_OPT_CONNECT_TIMEOUT faild !');
            }
            $mysqliRealConnect = self::$_mysqliObj->real_connect(
                $this->_dbHost,
                $this->_dbUser,
                $this->_dbPwd,
                $this->_dbName
            );
            if (!$mysqliRealConnect) {
                $this->mysqliRealConnectErrorno = mysqli_connect_errno();
                $this->mysqliRealConnectError = mysqli_connect_error();
                self::getDbException(
                    'Faild to connect to MySQL server ( ' .
                    $this->mysqliRealConnectErrorno .
                    ' )' .
                    $this->mysqliRealConnectError
                );
            }
        } catch (Exception $e) {
            exit($e->getMessage());
        }
    }

    /**
     * [getDbException 抛出数据库异常信息]
     *
     * @param string  $msg  [错误信息]
     * @param integer $code [错误code]
     *
     * @throw Exception
     *
     * @return void
     */
    public static function getDbException($msg, $code = 0)
    {
        throw new Exception($msg, $code);
    }

    /**
     * [__desctruct 销毁连接]
     *
     * @return [void] [销毁连接]
     */
    public function __destruct()
    {
        if (is_object(self::$_mysqliObj) && !self::$_mysqliObj->connect_errno) {
            self::$_mysqliObj->close();
        }
    }

}

// $mysql = new MySqliConnector(
//     [
//         'host' => '172.16.1.22',
//         'user' => 'cat',
//         'pwd'  => 'cat#605',
//         'dbname' => 'cat_tos'

//     ]
// );

// var_dump($mysql);
