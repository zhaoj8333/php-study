<?php

class Glob
{
    public static function listDir($dirPath,  $flag = GLOB_MARK)
    {
        if (!is_dir($dirPath)) {
            throw new Exception('Directory: ' . $dirPath . ' is not a valid path!');
        }

        return glob($this->_path . "*", $flag);
    }

    public static function listDirRecursively($dirPath = '', $flag = GLOB_MARK)
    {
        $dirFiles = [];

        if (!is_dir($dirPath)) {
            throw new Exception('Directory: ' . $dirPath . ' is not a valid path!');
        }

        $dirFiles = glob($dirPath . "*", $flag);
        foreach ($dirFiles as $key => $file) {
            if (is_dir($file)) {
                $tmp = self::listDirRecursively($file, $flag);
                $dirFiles = array_merge($dirFiles, $tmp);
            }
        }
        return $dirFiles;
    }

}
