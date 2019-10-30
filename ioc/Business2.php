<?php

interface IDeviceWriter
{
    public function saveToDevice();
}

class Business
{
    private $writer;

    // Setter injection      使用setter方法
    // Constructor injection 使用构造函数
    // Property Injection    直接设置属性
    public function setWriter(IDeviceWriter $writer)
    {
        $this->writer = $writer;
    }

    public function save()
    {
        $this->writer->saveToDevice();
    }
}

class FloppyWritter implements IDeviceWriter
{
    public function saveToDevice()
    {
        echo __METHOD__, "\n";
    }
}

class UsbWritter implements IDeviceWriter
{
    public function saveToDevice()
    {
        echo __METHOD__, "\n";
    }
}


$biz = new Business();
$biz->setWriter(new FloppyWritter());
$biz->save();

$biz->setWriter(new UsbWritter());
$biz->save();
