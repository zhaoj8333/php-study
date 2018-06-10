<?php

/**
 * @Author: zhaojun_cd
 * @Date:   2018-06-07 09:07:19
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-06-10 12:24:39
 */

require './FtpManager.php';

class FtpFileManager extends FtpManager
{

    private $_handle;

    private $_timeConsumed;

    function __construct()
    {
        parent::__construct();
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
        $details = [];

        $files = ftp_rawlist($this->ftpConn, $dir);
        if (empty($files)) {
            return $details;
        }

        foreach ($files as $key => $file) {
            $temp = explode(' ', $file);
            foreach ($temp as $k => $v) {
                if (empty($v)) {
                    unset($temp[$k]);
                }
            }
            $temp = array_values($temp);

            $details[$key] = [
                'type'   => substr($temp[0], 0, 1),
                'perm'   => substr($temp[0], 1),
                'owner'  => intval($temp[2]),
                'group'  => $temp[3],
                'links'  => intval($temp[1]),
                'size'   => intval($temp[4]),
                'modify' => strtotime($temp[5] . ' ' . $temp[6] . ' ' . $temp[7]),
                'name'   => $temp[8],
            ];
        }

        return $details;
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

}

$ftp = new FtpFileManager();

var_dump($ftp->getFilesDetail());