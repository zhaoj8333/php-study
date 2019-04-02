<?php

class FileChecker
{

    private $_filePath;

    private $_fileExt;

    private $_mimeTypes = [
        'xml'  => '',
        'ini'  => '',
        'yaml' => '',
        'php'  => '',
        'json' => '',
    ];

    private $_fileSize;

    function __construct($filePath)
    {
        if (empty($filePath) || !is_file($filePath)) {
            throw new Exception('place spedify the file you want to parse!');
        }
        $this->_filePath = $filePath;


    }

    public function parse()
    {

    }

    public function parseIni()
    {

    }

}

$check = new FileChecker('./tests/resources/info.md');

// finfo

// $finfo = new finfo(FILEINFO_MIME);
// $fileName = './tests/resources/68398.zip';
// $fileName = './tests/resources/67647.mov';
// $fileName = './tests/resources/68731.gif';
// $fileName = './tests/resources/test.pdf';
// $fileName = './tests/resources/test.png';
// $fileName = './tests/resources/info.md';
// $fileName = './tests/resources/test.mp3';

// var_dump($finfo->file($fileName));
// application/zip; charset=binary


// $finfo = finfo_open(FILEINFO_NONE);
// var_dump(finfo_file($finfo, $fileName));
// Audio file with ID3 version 2.4.0, extended header,
// contains: MPEG ADTS, layer III, v1, 192 kbps, 44.1 kHz, Stereo

// finfo_close($finfo);

// $finfo = finfo_open(FILEINFO_MIME);

// $files = glob("./tests/resources/*");
// foreach ($files as $key => $file) {
//     var_dump(finfo_file($finfo, $file));
// }

// finfo_close($finfo);
//

// $fi = new finfo(FILEINFO_PRESERVE_ATIME|FILEINFO_SYMLINK|FILEINFO_DEVICES);

// $files = glob("./tests/resources/*");
// var_dump($files);

// foreach ($files as $key => $file) {
//     // only read very limited contents, avoid to memory overflow
//     // but the maxlen to read have to be at least 512 bytes or longer
//     // to read full mime type information of the file
//     echo $fi->buffer(file_get_contents($file, false, null, 0, 512)), "\n";
// }

