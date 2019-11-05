<?php

function myError($errno, $errstr, $errfile, $errline)
{
    echo "[$errno] $errstr", "\n";
}

set_error_handler('myError');

try {
    1/0;
} catch (Exception $e) {

}
