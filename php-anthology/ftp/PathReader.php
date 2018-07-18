<?php

/**
 * @Author: zhaojun_cd
 * @Date:   2018-06-08 17:10:28
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-06-12 15:00:54
 */

class PathReader
{
    private $_fileSize = 0;

    private $_readSize = 1;  // 1 MB

    private $_filePath = '';

    private $_pathType = 'file'; // file, dir

    private $_pathHandle;

    private $_unreadablePathes = [];

    private $_readablePathes = [];

    const READ_MODE = 'rb';

    /**
     * [__construct this can not be intialized throw this function]
     *
     * @author zhaojun
     * @datetime 2018-06-08T17:36:41+0800
     *
     * @throws [Exception]
     *
     * @param [string]  $file     [file path]
     * @param [integer] $readSize [read size each time]
     *
     * @return [void]
     */
    private function __construct($file)
    {
        $this->_filePath = realpath($file);
        if (is_dir($this->_filePath)) {
            $this->_pathType = 'dir';
        }
    }

    /**
     * [init initialize this class as a singleton]
     *
     * @author zhaojun
     * @datetime 2018-06-10T12:53:31+0800
     *
     * @throws [Exception]
     *
     * @param [string] $path [path specified]
     *
     * @return [object] [initialized object of this class]
     */
    public static function init($path)
    {
        if (!file_exists($path)) {
            throw new Exception('path: ' . $path . ' does not exist !');
        }
        if (!is_readable($path)) {
            throw new Exception('path: ' . $path . ' is not readable !');
        }

        return new self($path);
    }

    /**
     * [setReadSize set read size before read a single file, especially the file is big]
     *
     * @author zhaojun
     * @datetime 2018-06-10T13:01:24+0800
     *
     * @throws [Exception]
     *
     * @param [integer] $readSize [read size when loop]
     *
     * @return [void]
     */
    public function setReadSize($readSize)
    {
        if ($readSize <= 0 || $readSize > 10) {
            throw new Exception('read size should be between 1 and 10');
        }

        $this->_readSize = $readSize;
    }

    /**
     * [_getPathFiles get all files beneath a path, and return it in a two dimension array]
     *
     * @author zhaojun
     * @datetime 2018-06-12T11:30:48+0800
     *
     * @throws [Exception]
     *
     * @param [string] $path [path you want to read]
     *
     * @return [array] [files of the path]
     */
    private static function _getPathFiles($path)
    {
        $allFiles = [];

        $handle = null;

        if ($path == 'file') {
            return $path;
        } else {
            $handle = opendir($path);
        }

        while ($file = readdir($handle)) {
            if (false == $file) {
                break;
            }
            if ($file == '.' || $file == '..') {
                continue;
            }
            $temp = $path . DIRECTORY_SEPARATOR . $file;
            if (is_readable($temp)) {
                $allFiles[] = $temp;
                if (is_dir($temp)) {
                    $allFiles = array_merge(self::_getPathFiles($file), $files);
                }
            } else {
                $this->_unreadablePathes[] = $temp;
                continue;
            }

        }

        return $allFiles;
    }

    /**
     * [_getPathFilesDetail get all files beneath a path, and return it in a three dimension array]
     *
     * @author zhaojun
     * @datetime 2018-06-12T11:30:48+0800
     *
     * @throws [Exception]
     *
     * @param [string] $path [path you want to read]
     *
     * @return [array] [files of the path]
     */
    private function _getPathFilesDetail($path)
    {
        if (is_file($path)) {
            return $this->path;
        }
        while ($file = readdir($this->_pathHandle)) {
            if (false == $file) {
                break;
            }
            if ($file == '.' || $file == '..') {
                continue;
            }
            $temp = $this->_filePath . DIRECTORY_SEPARATOR . $file;
            if (is_readable($temp)) {
                $this->_readablePathes[] = $temp;
            } else {
                $this->_unreadablePathes[] = $temp;
                continue;
            }

        }
var_dump($this->_readablePathes, $this->_unreadablePathes);
    }

    /**
     * [_getPathTree get hierarchy structure of specified directory]
     *
     * @author zhaojun
     * @datetime 2018-06-10T12:58:40+0800
     *
     * @throws [Exception]
     *
     * @return [array] [tree structure of directory and files]
     */
    private function _getPathTree($path)
    {

    }

    /**
     * [_getPathTreeDetail get hierarchy structure of specified directory
     *  include details info of the directory and file]
     *
     * @author zhaojun
     * @datetime 2018-06-10T12:58:40+0800
     *
     * @throws [Exception]
     *
     * @return [array] [hierarchy contained details of directory and files]
     */
    private function _getPathTreeDetail($dir)
    {

    }

    /**
     * [readPath read file iterately]
     *
     * @author zhaojun
     * @datetime 2018-06-08T17:53:47+0800
     *
     * @throws [Exception]
     *
     * @return [string] [file contents read]
     */
    public function readPath()
    {
        // if ($this->_filePath == 'file') {
        //     $this->_pathHandle = fopen($this->_filePath);
        // } else {
        //     $this->_pathHandle = opendir($this->_filePath);
        // }
        // if (!$this->_pathHandle) {
        //     throw new Exception('failed to open dir: ' . $this->_filePath);
        // }

        $files = self::_getPathFiles($this->_filePath);
var_dump($files);
        $this->closePath();
    }

    /**
     * [closePath close resource variable of current opened file or directory]
     *
     * @author zhaojun
     * @datetime 2018-06-12T11:20:03+0800
     *
     * @throws [Exception]
     *
     * @return [void]
     */
    public function closePath()
    {
        closedir($this->_pathHandle);
    }

}

$path = '/home/zhaojun/www/php-study/php-anthology/file/tests/';

$reader = PathReader::init($path, 5);
$reader->readPath();