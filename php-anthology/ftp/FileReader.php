<?php

/**
 * @Author: zhaojun_cd
 * @Date:   2018-06-08 17:10:28
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-06-08 18:03:30
 */

class FileReader
{
    private $_fileSize = 0;

    private $_readSize = 0;

    private $_filePath = '';

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
    private function __construct($file, $readSize)
    {
        $this->_filePath = realpath($file);
        $this->_fileSize = filesize($file);
        $this->_readSize = $readSize;
    }

    /**
     * [fileReaderInit initialize this class]
     *
     * @author zhaojun
     * @datetime 2018-06-08T17:38:41+0800
     *
     * @throws [Exception]
     *
     * @return [object] [initialized object of this class]
     */
    public static function fileReaderInit($path, $readSize = 1)
    {
        if (!is_file($path)) {
            throw new Exception('file: ' . $path . ' does not exist !');
        }
        if (!is_readable($path)) {
            throw new Exception('file: ' . $path . ' is not readable !');
        }
        if ($readSize <= 0 || $readSize > 10) {
            throw new Exception('read size should be between 1 and 10');
        }

        return new self($path, $readSize);
    }

    /**
     * [readFile read file iterately]
     *
     * @author zhaojun
     * @datetime 2018-06-08T17:53:47+0800
     *
     * @throws [Exception]
     *
     * @return [string] [file contents read]
     */
    public function readFile()
    {
        var_dump($this->_filePath);
    }

}

$reader = FileReader::fileReaderInit('/home/zhaojun/dumps/cat_tos-data.sql', 5);
$reader->readFile();