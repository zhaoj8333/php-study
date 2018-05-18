<?php
require 'Message.php';
class PoliteMessage extends Message {
    function PoliteMessage()
    {
        $this->setMessage('How are you today?');
    }
}