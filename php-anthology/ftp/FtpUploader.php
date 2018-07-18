<?php

/**
 * @Author: zhaojun
 * @Date:   2018-06-07 09:07:03
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-06-10 12:50:14
 */

require './FtpManager.php';

class FtpUploader extends FtpManager
{

    /**
     * [__construct initialize this class]
     *
     * @author zhaojun
     * @datetime 2018-06-10T12:46:39+0800
     *
     * @throws [Exception]
     *
     * @param [string] $remotePath [path of ftp-server]
     * @param [string] $localPath  [path of local]
     *
     *
     */
    public function __construct($remotePath, $localPath)
    {
        parent::__construct();

        $this->setLocalPath($localPath);
        $this->getLocalPathSize();
        $this->setRemoteFile($remotePath);
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
            $this->remotePath,
            $this->handle,
            FTP_BINARY
        );

        $this->afterOperate();
        $this->unlockFile();
        $this->closeFile();

        if (!$result) {
            $this->buildFileException($this->localPath, 500);
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
     * @param [string] $remotePath [remote path you want to upload]
     * @param [string] $localPath  [local file path]
     *
     * @return [array] [file info of the uploaded file]
     */
    public function uploadFile()
    {
        try {
            $this->_pushFile();

            $uploadedFile = [
                'file_name'   => $this->remotePath,
                'file_size'   => ftp_size($this->ftpConn, $this->remotePath),
                'file_mtime'  => ftp_mdtm($this->ftpConn, $this->remotePath),
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

    /**
     * [_pushDirectory push directory to ftp-server]
     *
     * @author zhaojun
     * @datetime 2018-06-10T12:37:32+0800
     *
     * @throws [Exception]
     *
     * @return [void]
     */
    private function _pushDirectory()
    {

    }

    /**
     * [uploadDirectory upload a directory and files, directories underneath it]
     *
     * @author zhaojun
     * @datetime 2018-06-10T12:34:58+0800
     *
     * @throws [Exception]
     *
     * @return [array] [file info of the uploaded directory in a directory tree hierarchy]
     */
    public function uploadDirectory()
    {

    }

}

$dir = '/home/zhaojun/www/php-study/php-anthology/file/tests/resources/68731.gif';
$file = '68731.gif';

$ftpUpload = new FtpUploader('dir-test-1', $dir);

$res = $ftpUpload->uploadFile();

var_dump($res);