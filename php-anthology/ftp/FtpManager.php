<?php

/**
 * @Author: zhaojun
 * @Date:   2018-06-07 09:07:19
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-06-07 15:55:57
 */

class FtpManager
{
    const FILE_READ_SIZE = 20;  // MB

    protected $ftpConn;

    protected $handle;

    protected $timeConsumed;

    protected $remoteFile;

    protected $localFile;

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
     * [setLocalFile set $localFile member variable]
     *
     * @author zhaojun
     * @datetime 2018-06-07T15:35:05+0800
     *
     * @throws [Exception]
     *
     * @param [string] $filePath [file path]
     *
     * @return   [return]
     */
    public function setLocalFile($filePath)
    {
        if (!is_file($filePath)) {
            throw new Exception('file :' . $filePath . ' does not exist');
        }
        $this->localFile = $filePath;
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
     * [getFilesDetail get files in specifield directory]
     *
     * @author zhaojun
     * @datetime 2018-06-05T11:41:43+0800
     *
     * @param string $dir [directory]
     *
     * @return [array] [list of files]
     */
    public function getFilesDetail($dir = '/')
    {
        $return = [];

        $files = ftp_rawlist($this->ftpConn, $dir);

        foreach ($files as $key => $file) {
            $temp = explode(' ', $file);
            foreach ($temp as $k => $v) {
                if (empty($v)) {
                    unset($temp[$k]);
                }
            }
            $temp = array_values($temp);

            $return[$key]['type']   = substr($temp[0], 0, 1);
            $return[$key]['perm']   = substr($temp[0], 1);
            $return[$key]['owner']  = intval($temp[2]);
            $return[$key]['group']  = $temp[3];
            $return[$key]['links']  = intval($temp[1]);
            $return[$key]['size']   = intval($temp[4]);
            $return[$key]['modify'] = $temp[5] . ' ' . $temp[6] . ' ' . $temp[7];
            $return[$key]['name']   = $temp[8];
        }

        return $return;
    }

    /**
     * [getFileNames get file names of specified dir]
     *
     * @author zhaojun
     * @datetime 2018-06-06T15:22:25+0800
     *
     * @param string $dir [the directory you want to read]
     *
     * @return [array] [file names of $dir]
     */
    public function getFileNames($dir = '/')
    {
        return ftp_nlist($this->ftpConn, $dir);
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
            $fileMode .= 'b';
        }
        $this->handle = fopen($this->localFile, $mode . 'b');
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
            throw new Exception('no opened file to lock');
        }
        flock($this->handle, LOCK_EX);
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
            throw new Exception('no opened file!');
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
        flock($this->handle, LOCK_UN);
        ftp_close($this->ftpConn);
    }
}

$ftp = new FtpManager();
$ftp->setLocalFile('/home/zhaojun/dumps/MySQL.txt');
$ftp->openFile('r');
$ftp->lockFile();


