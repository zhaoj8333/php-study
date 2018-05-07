<?php
class Output {
    var $lookandfeel;
    var $output;
    // Constructor takes LookAndFeel as its argument
    function __construct($lookandfeel)
    {
        $this->lookandfeel = $lookandfeel;
    }
    function buildOutput()
    {
        $this->output =
            'Color is '
            . $this->lookandfeel->getColor()
            . ' and size is '
            . $this->lookandfeel->getSize();
    }
    function display()
    {
        $this->buildOutput();
        return $this->output;
    }
}