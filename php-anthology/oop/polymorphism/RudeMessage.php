<?php

require 'Message.php';

class RudeMessage extends Message {
    function RudeMessage()
    {
        $this->setMessage('You look like *%&* today!');
    }
}
