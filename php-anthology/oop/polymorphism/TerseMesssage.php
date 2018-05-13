<?php
require 'Message.php';
class TerseMessage extends Message {
    function TerseMessage()
    {
        $this->setMessage('Howzit?');
    }
}