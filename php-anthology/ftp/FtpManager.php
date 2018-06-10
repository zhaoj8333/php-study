<?php

/**
 * @Author: zhaojun
 * @Date:   2018-06-07 09:07:19
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-06-10 12:21:59
 */

class FtpManager
{
    protected $ftpConn;

    protected $handle;

    protected $timeConsumed;

    protected $remoteFile;

    protected $localFile;

    protected $localStorePath;

    protected $startTime = 0;

    protected $endTime = 0;

    protected $useMicrotime = true;

    protected $fileExceptions = [
        100 => "file or directory: msg does not exist !",
        101 => "file or directory: msg is not readable !",
        102 => "file or directory: msg is not writable !",
        103 => "file or directory: there is a same file under the directory !",

        200 => "please specify the local storage path first !",
        201 => "generate target file faild",
        300 => "no opened file to lock",
        301 => "file or directory: msg is used by other program !",

        400 => "download file: msg faild",

        500 => "upload file: msg failed",
    ];

    /**
     * [__construct initialize this class]
     *
     * @author zhaojun
     * @datetime 2018-06-07T10:01:10+0800
     *
     * @throws   [Exception]
     *
     * @return   [return]
     */
    public function __construct()
    {
        require 'FtpConnector.php';
        $config = require 'config.php';

        $this->ftpConn = FtpConnector::ftpInit($config);
    }

    /**
     * [beforeOperate record the download or upload starttime]
     *
     * @author zhaojun
     * @datetime 2018-06-08T14:12:46+0800
     *
     * @return [void]
     */
    protected function beforeOperate()
    {
        if ($this->useMicrotime) {
            $this->startTime = microtime(true);
        } else {
            $this->startTime = time();
        }
    }

    /**
     * [afterOperate record the download or upload endtime]
     *
     * @author zhaojun
     * @datetime 2018-06-08T14:12:46+0800
     *
     * @return [void]
     */
    protected function afterOperate()
    {
        if ($this->useMicrotime) {
            $this->endTime = microtime(true);
        } else {
            $this->endTime = time();
        }
    }

    /**
     * [buildFileException build exceptions when openrating files]
     *
     * @author zhaojun
     * @datetime 2018-06-08T11:11:57+0800
     *
     * @throws [Exception]
     *
     * @param [string] $message [specified information]
     * @param [string] $code    [code you specified]
     *
     * @return [void]
     */
    protected function buildFileException($message = '', $code)
    {
        throw new Exception(
            str_replace(
                'msg',
                $message,
                $this->fileExceptions[$code]
            ),
            $code
        );
    }

    /**
     * [setLocalFile set $localFile member variable]
     *
     * @author zhaojun
     * @datetime 2018-06-07T15:35:05+0800
     *
     * @throws [Exception]
     *
     * @param [string] $filePath [file path]
     *
     * @return [return]
     */
    public function setLocalFile($filePath)
    {
        if (!is_file($filePath)) {
            $this->buildFileException($filePath, 100);
        }

        $this->localFile = $filePath;
    }

    /**
     * [setLocalStoragePath set local storage path]
     *
     * @author zhaojun
     * @datetime 2018-06-08T10:35:02+0800
     *
     * @throws [Exception]
     *
     * @param [string] $path [path specified by user]
     *
     * @return void
     */
    public function setLocalStoragePath($path)
    {
        $storageName = '';

        if (is_dir($path)) {
            $storageName = $path . '/' . md5($this->remoteFile)
                         . '-' . $this->remoteFile;
        } else {
            if (is_file($path)) {
                $this->buildFileException('', 103);
            }
            $storageName = $path;
        }

        $dirname = dirname($storageName);
        if (!is_writable($dirname)) {
            $this->buildFileException($dirname, 102);
        }

        $this->localStorePath = &$storageName;
    }

    /**
     * [getLocalFile return the member variable $localFile]
     *
     * @author zhaojun
     * @datetime 2018-06-07T15:36:24+0800
     *
     * @return [string] [file path]
     */
    public function getLocalFile()
    {
        return $this->localFile;
    }

    /**
     * [setRemoteFile set the member varable $remoteFile]
     *
     * @author zhaojun
     * @datetime 2018-06-07T15:37:53+0800
     *
     * @param [string] $remoteFile [url or path of remote file]
     *
     * @return [void]
     */
    public function setRemoteFile($remoteFile)
    {
        $this->remoteFile = $remoteFile;
    }

    /**
     * [getCurrentDir return current directory]
     *
     * @author zhaojun
     * @datetime 2018-06-05T11:39:22+0800
     *
     * @return [string] [directory]
     */
    public function getCurrentDir()
    {
        return ftp_pwd($this->ftpConn);
    }

    /**
     * [openFile open local file]
     *
     * @author zhaojun
     * @datetime 2018-06-07T11:20:47+0800
     *
     * @throws [Exception]
     *
     * @param [string] $mode [how to open the file]
     *
     * @return [void]
     */
    public function openFile($mode)
    {
        $fileMode = '';

        if (!stripos($mode, 'b')) {
            $fileMode .= $mode . 'b';
        }
        $this->handle = fopen($this->localFile, $mode . 'b');
    }

    /**
     * [lockFileExclusively lock opened file]
     *
     * @author zhaojun
     * @datetime 2018-06-07T15:27:35+0800
     *
     * @throws [Exception]
     *
     * @return [void]
     */
    public function lockFileExclusively()
    {
        if (!$this->handle) {
            $this->buildFileException('', 300);
        }

        $exLock = flock($this->handle, LOCK_EX);
        if (!$exLock) {
            $this->buildFileException($this->localFile, 301);
        }
    }

    /**
     * [lockFile lock opened file]
     *
     * @author zhaojun
     * @datetime 2018-06-07T15:27:35+0800
     *
     * @throws [Exception]
     *
     * @return [void]
     */
    public function lockFile()
    {
        if (!$this->handle) {
            $this->buildFileException('', 300);
        }

        $exLock = flock($this->handle, LOCK_SH);
        if (!$exLock) {
            $this->buildFileException($this->localFile, 301);
        }
    }

    /**
     * [unlockFile unlock the locked file]
     *
     * @author zhaojun
     * @datetime 2018-06-08T10:16:21+0800
     *
     * @return [void]
     */
    public function unlockFile()
    {
        flock($this->handle, LOCK_UN);
    }

    /**
     * [closeFile close the opened file]
     *
     * @author zhaojun
     * @datetime 2018-06-07T15:23:55+0800
     *
     * @throws [Exception]
     *
     * @return [void]
     */
    public function closeFile()
    {
        if (!$this->handle) {
            $this->buildFileException('', 300);
        }
        fclose($this->handle);
    }

    /**
     * [__destruct close the connection of ftp server]
     * this could not be called in FtpConnector class
     *
     * @author zhaojun
     * @datetime 2018-06-05T11:37:00+0800
     *
     * @throws [Exception]
     *
     * @return void
     */
    public function __destruct()
    {
        ftp_close($this->ftpConn);
    }
}
