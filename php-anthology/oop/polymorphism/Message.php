<?php
class Message {
    var $message;
    function setMessage($message)
    {
        $this->message = $message;
    }
    function getMessage()
    {
        return $this->message;
    }
}


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

class PoliteMessage extends Message {
    function PoliteMessage()
    {
        $this->setMessage('How are you today?');
    }
}


class RudeMessage extends Message {
    function RudeMessage()
    {
        $this->setMessage('You look like *%&* today!');
    }
}

class TerseMessage extends Message {
    function TerseMessage()
    {
        $this->setMessage('Howzit?');
    }
}


// the ability of different classes to share an interface
// An interface is one or more methods that let you use a class for a particular purpose.

$classNames = [
    'PoliteMessage',
    'TerseMessage',
    'RudeMessage'
];

$msgs = [];

srand((float)microtime() * 1000000);

for ($i = 0; $i < 10; $i++) {
    shuffle($classNames);
    // var_dump($classNames[0]);
    $msgs[] = new $classNames[0]();
}

// var_dump($classNames);

$msgReader = new MessageReader($msgs);