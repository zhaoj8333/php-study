<?php

class Business
{
    private $writer;

    public function __construct()
    {
        $this->writer = new FloppyWritter();
    }

    public function save()
    {
        $this->writer->saveToFloppy();
    }
}


class FloppyWritter
{
    public function saveToFloppy()
    {
        echo __METHOD__;
    }
}

$biz = new Business();
$biz->save();
