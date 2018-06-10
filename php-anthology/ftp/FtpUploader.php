<?php

/**
 * @Author: zhaojun
 * @Date:   2018-06-07 09:07:03
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-06-10 12:21:37
 */

require './FtpManager.php';

class FtpUploader extends FtpManager
{
    private $_localFileSize = 0;

    function __construct($remoteFile, $localFile)
    {
        parent::__construct();

        $this->setLocalFile($localFile);
        $this->_localFileSize = filesize($this->localFile);
        $this->setRemoteFile($remoteFile);
    }

    /**
     * [_pushFile push local file to ftp-server]
     *
     * @author zhaojun
     * @datetime 2018-06-08T17:00:20+0800
     *
     * @throws [Exception]
     *
     * @return [void]
     */
    private function _pushFile()
    {
        $this->openFile('r');
        $this->lockFile();
        $this->beforeOperate();

        $result = ftp_fput(
            $this->ftpConn,
            $this->remoteFile,
            $this->handle,
            FTP_BINARY
        );

        $this->afterOperate();
        $this->unlockFile();
        $this->closeFile();

        if (!$result) {
            $this->buildFileException($this->localFile, 500);
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
        try {
            $this->_pushFile();

            $uploadedFile = [
                'file_name'   => $this->remoteFile,
                'file_size'   => ftp_size($this->ftpConn, $this->remoteFile),
                'file_mtime'  => ftp_mdtm($this->ftpConn, $this->remoteFile),
                'upload_time' => $this->endTime - $this->startTime
            ];
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }

        return [
            'result' => 'success',
            'file' => $uploadedFile
        ];
    }

}

$ftpUpload = new FtpUploader('/streamreactor.pdf', '/home/zhaojun/dumps/streamreactor.pdf');

$res = $ftpUpload->uploadFile();

var_dump($res);