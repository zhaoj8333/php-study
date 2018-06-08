<?php

/**
 * @Author: zhaojun_cd
 * @Date:   2018-06-07 09:07:19
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-06-07 09:18:02
 */

class FtpFileManager extends FtpManager
{


    private $_handle;

    private $_timeConsumed;

    function __construct($conn)
    {

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
        return ftp_pwd($this->_resource);
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

        $files = ftp_rawlist($this->_resource, $dir);

        foreach ($files as $key => $file) {
            $temp     = explode(' ', $file);
            $fileType = substr($temp[0], 0, 1);

            $return[$key]['type']  = $fileType;
            $return[$key]['perm']  = substr($temp[0], 1);
            $return[$key]['links'] = $temp[4];
            $return[$key]['owner'] = $temp[5];
            $return[$key]['group'] = $temp[12];

            if ($fileType == 'd') {
                $return[$key]['size'] = $temp[24];
                $return[$key]['name'] = $temp[28];
                $return[$key]['last_modified'] = $temp[25] . ' ' . $temp[26] . ' ' . $temp[27];
            } elseif ($fileType == '-') {
                $return[$key]['size'] = $temp[17];
                $return[$key]['name'] = $temp[21];
                $return[$key]['last_modified'] = $temp[18] . ' ' . $temp[19] . ' ' . $temp[20];
            }
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
        return ftp_nlist($dir);
    }

}