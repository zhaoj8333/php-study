<?php

/**
 * @Author: zhaojun
 * @Date:   2018-06-07 09:06:53
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-06-07 15:33:26
 */

class FtpDownloader extends FtpManager
{

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
    public function downloadFile($file, $dest = '')
    {
        $localPath = '';

        try {
            $localPath = '';
            if (empty($dest)) {
                $localPath = './';
            }
            if (is_dir($dest)) {
                $localPath = $dest . basename($file);
            }
            if (!is_writable($dest)) {
                throw new Exception('path: (' . $dest . ' ) is not writable!');
            }
            if (is_file($localPath)) {
                throw new Exception('there is a same file: ' . $dest);
            }
            $fileInit = touch($localPath);
            if (!$fileInit) {
                throw new Exception('file download initilization failed!');
            }
            $this->handle = fopen($localPath, 'w');

            $startTime = microtime(true);
            $result    = ftp_fget($this->ftpConn, $this->handle, $file, FTP_BINARY, 0);
            if (!$result) {
                throw new Exception('download file: ' . $file . ' faild');
            }
            fclose($this->handle);

            $this->timeConsumed = microtime(true) - $startTime;
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }

        return [
            'download_time' => $this->timeConsumed,
            'file_info' => pathinfo($localPath)
        ];
    }

}