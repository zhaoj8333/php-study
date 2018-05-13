<?php

class MessageReader {
    var $messages;
    function MessageReader($messages) {
        $this->messages = $messages;
        $this->readMessages();
    }
    function readMessages() {
        foreach ($this->messages as $message) {
            echo $message->getMessage() . '<br />';
        }
    }
}