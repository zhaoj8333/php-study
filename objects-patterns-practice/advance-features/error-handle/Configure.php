<?php

class Configure
{
    private $_file;

    private $_xml;

    private $_lastMatch;

    function __construct(string $file)
    {
        if (!is_file($file)) {
            throw new FileException('file: ' . $file. ' does not exist!');
        }
        $this->_file = $file;
        $this->_xml  = simplexml_load_file($file, null, LIBXML_NOERROR);
        if (! is_object($this->_xml)) {
            throw new XmlException('载入xml文件错误');
        }
    }

    public function write()
    {
        if (is_writable($this->_file)) {
            throw new Exception('file' . $this->_file . ' is not writable');
        }
        file_put_contents($this->_file, $this->_xml->asXML());
    }

    public function get(string $str)
    {
        $matches = $this->_xml->xpath("/conf/item[@name=\"$str\"]");
        if (count($matches)) {
            $this->_lastMatch = $matches[0];
            return (string)$matches[0];
        }
        return null;
    }

    public function set(string $key, string $value)
    {
        if (! is_null($this->get($key))) {
            $this->_lastMatch[0] = $value;
            return;
        }
        $conf = $this->_xml->conf;
        $this->_xml->addChild('item', $value)->addAttribute('name', $key);
    }
}

// var_dump(get_class_methods('Exception'));
//
// The throw keyword is used in conjunction with an Exception object.
// It halts execution of the current method
// and passes responsibility for handling the error back to the calling code

class XmlException extends \Exception
{
    private $_error;

    function __construct(\LibXmlError $error)
    {
        $shortFile = basename($error->file);
        $message   = "[{$shortFile}, line {$error->line}, col {$error->column}] {$error->message}";
        $this->_error = $error;
        parent::__construct($message, $error->code);
    }

    public function getLibXmlError()
    {
        return $this->_error;
    }
}

class FileException extends \Exception
{
}

class ConfException extends \Exception
{
}

// try {
//     $conf = new Configure(__DIR__ . '/conf.xml');
//     print($conf->get('user')) . "\n";
//     print($conf->get('host')) . "\n";
//     $conf->set('pass', 'newpass');
//     $conf->write();
// } catch (Exception $e) {
//     // var_dump(get_class_methods('Exception'));
//     // var_dump($e->getMessage());
//     // var_dump($e->getCode());
//     // var_dump($e->getFile());
//     // var_dump($e->getLine());
//     // var_dump($e->getTrace());
//     // var_dump($e->getPrevious());
//     // var_dump($e->getTraceAsString());
//     exit($e->getMessage());
//     // var_dump($e);
// }

try {
    $conf = new Configure(__DIR__ . '/conf.xml');
    print($conf->get('user')) . "\n";
    print($conf->get('host')) . "\n";
    $conf->set('pass', 'newpass');
    $conf->write();

// The first to match will be executed, so remember to place the most generic
// type at the end and the most specialized at the start
} catch (FileException $e) {
    exit($e->getMessage());
} catch (XmlException $e) {
    exit($e->getMessage());
} catch (ConfException $e) {
    exit($e->getMessage());
} catch (\Exception $e) {
    exit($e->getMessage());
}