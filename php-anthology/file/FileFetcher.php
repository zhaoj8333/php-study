<?php

class FileCatcher
{

    private $_baseName;

    private $_fileExt;

    private $_isRemote = false;

    private $_cachePath = './conf/';

    private $_fileContent;

    private $_urlValidator = "/^(http|https|ftp):\/\/(([A-Z0-9][A-Z0-9_-]*)(\.[A-Z0-9][A-Z0-9_-]*)+)(?::\d{1,5})?(?:$|[?\/#])/i";

    public $filePath;

    /**
     * [__construct construction path]
     *
     * @param string  $filePath  [file path]
     *
     * @return void
     */
    public function __construct($filePath)
    {
        $urlValid = preg_match($this->_urlValidator, $filePath);
        if ($urlValid) {
            $this->_isRemote = true;
        }
        if (!is_file($filePath) && !$urlValid) {
            throw new Exception('File: ' . $filePath . 'do not exist! ');
        }
        $this->setFilePath($filePath);

        $pathInfo = pathinfo($filePath);
        $this->_fileExt  = $pathInfo['extension'];
        $this->_baseName = $pathInfo['basename'];
    }

    protected function setFilePath($filePath)
    {
        $this->filePath = $filePath;
    }

    public function fetchFile()
    {
        if ($this->_isRemote) {
            $content = $this->readFileByCurl();
        } else {
            $content = @file_get_contents($this->filePath);
        }
        if (!$content) {
            throw new Exception('File: failed to catch ' . $this->filePath);
        }
        $this->_fileContent = &$content;
    }

    private function readFileByCurl()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->filePath);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

        $data = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return ($httpCode >= 200 && $httpCode < 300) ? $data : false;
    }

    public function locallyCacheFile($catchPath = '')
    {
        if (!is_dir($catchPath)) {
            throw new Exception('Path: ' . $catchPath . ' is not a valid path! ');
        }
        if (!is_writable($catchPath)) {
            throw new Exception('cache pateh: ' . $catchPath . ' is not writable!');
        }

        $this->_cachePath = empty($catchPath) ? $this->_cachePath : $catchPath;
        $fileSum = md5($this->_fileContent);
        $cachePath = $this->_cachePath . $fileSum . '-' . $this->_baseName;

        $exists = $this->hasSameCache($cachePath);
        // if has same file name, ignore the following steps
        if (!$exists) {
            $cacheRes = file_put_contents(
                $cachePath,
                $this->_fileContent
            );
            if (!$cacheRes) {
                throw new Exception('Generate File: ' . $catchPath . $this->_baseName . ' has failed!');
            }
            $this->setFilePath($cachePath);
        }
        return array_merge(
            pathinfo($cachePath),
            [
                'realpath' => realpath($cachePath),
                'filesize' => filesize($cachePath),
                'cachetime' => filectime($cachePath),
            ]
        );
    }

    public function hasSameCache(&$cachePath)
    {
        $cacheHandle = opendir(dirname($cachePath));

        $existFiles = [];
        while ($cache = readdir($cacheHandle)) {
            if ($cache == '.' || $cache == '..') {
                continue;
            }
            $existFiles[] = $cache;
        }

        return in_array(basename($cachePath), $existFiles) ? true : false;
    }

}
