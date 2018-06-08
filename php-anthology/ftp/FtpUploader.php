<?php

/**
 * @Author: zhaojun
 * @Date:   2018-06-07 09:07:03
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-06-07 15:19:31
 */

class FtpUploader extends FtpManager
{

    function __construct($remoteFile, $localFile)
    {
        parent::__construct();
        if (!is_file($localFile)) {
            throw new Exception('the file you want to upload does not exist!');
        }
        if (!is_readable($localFile)) {
            throw new Exception('can not read the file you want to upload!');
        }

    }

    /**
     * [uploadFile upload local file to ftp-server]
     *
     * @author zhaojun
     * @datetime 2018-06-06T17:43:06+0800
     *
     * @throws [\Exception]
     *
     * @param [string] $remoteFile [remote path you want to upload]
     * @param [string] $localFile  [local file path]
     *
     * @return [array] [file info of the uploaded file]
     */
    public function uploadFile()
    {
        $uploadedFile = [];
        try {

            $this->handle = fopen($localFile, 'r');
            $startTime = microtime(true);
            $result = ftp_fput($this->ftpConn, $remoteFile, $this->handle, FTP_BINARY);
            $this->timeConsumed = microtime(true) - $startTime;
            if (!$result) {
                throw new Exception('upload file to ftp failed');
            }

            $uploadFile['file_name']   = $remoteFile;
            $uploadFile['file_size']   = ftp_size($this->ftpConn, $remoteFile);
            $uploadFile['file_mtime']  = ftp_mdtm($this->ftpConn, $remoteFile);
            $uploadFile['upload_time'] = $this->timeConsumed;

            fclose($this->handle);
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }

        return $uploadFile;
    }

}