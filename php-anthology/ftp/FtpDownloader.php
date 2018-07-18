<?php

/**
 * @Author: zhaojun
 * @Date:   2018-06-07 09:06:53
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-06-10 12:41:42
 */

require './FtpManager.php';

class FtpDownloader extends FtpManager
{

    private $downloadTarget;

    private $remoteFileSize = 0;

    public function __construct($remoteFile, $storePath = './')
    {
        parent::__construct();

        $this->setRemoteFile($remoteFile);
        $this->remoteFileSize = ftp_size($this->ftpConn, $this->remoteFile);
        $this->setLocalStoragePath($storePath);

    }

    /**
     * [setDownloadTarget touch the target file to be read and to store the remote file]
     *
     * @author zhaojun
     * @datetime 2018-06-08T13:58:05+0800
     *
     * @throws [Exception]
     *
     * @return [return]
     */
    protected function setDownloadTarget()
    {
        if (!$this->localStorePath) {
            $this->buildFileException('', 200);
        }

        $target = touch($this->localStorePath);

        if (!$target) {
            $this->buildFileException('', 201);
        }
    }

    /**
     * [_getFtpFile get ftp file and record its time]
     *
     * @author zhaojun
     * @datetime 2018-06-08T14:21:08+0800
     *
     * @throws [Exception]
     *
     * @return [type] [description]
     */
    private function _getFtpFile()
    {
        $this->openFile('w');
        $this->lockFileExclusively();
        $this->beforeOperate();

        $result = ftp_fget(
            $this->ftpConn,
            $this->handle,
            $this->remoteFile,
            FTP_BINARY,
            0
        );

        $this->afterOperate();
        $this->unlockFile();
        $this->closeFile();

        if (!$result) {
            $this->buildFileException($this->remoteFile, 400);
        }
    }

    /**
     * [downloadFile get remote file and store it in a opened local file]
     *
     * @author zhaojun
     * @datetime 2018-06-06T15:30:45+0800
     *
     * @throws [Exception]
     *
     * @param [string] $file [remote file name]
     * @param [string] $dest [store path]
     *
     * @return [array] [return the file info of downloaded and the downloading infos]
     */
    public function downloadFile()
    {
        try {
            $this->setDownloadTarget();
            $this->setLocalPath($this->localStorePath);

            $this->_getFtpFile();

            $this->setLocalPath($this->localStorePath);
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }


        $fileInfo = [
            'download_time' => $this->endTime - $this->startTime,
            'transfer_size' => $this->remoteFileSize,
            'real_path'     => realpath($this->localFile),
            'downloaded_at' => filemtime($this->localFile)
        ];

        return [
            'result' => 'success',
            'file'   => array_merge(
                pathinfo($this->localFile),
                $fileInfo
            )
        ];
    }
}

$download = new FtpDownloader('/test/', '/home/zhaojun/dumps/test/');
$res = $download->downloadFile();

var_dump($res);