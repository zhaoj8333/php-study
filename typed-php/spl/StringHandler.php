<?php

class StringHandler extends SplString
{
    public function slice($start = 0, $length = null)
    {
        if ($length === null) {
            return substr($this, $start);
        }

        return substr($this, $start, $length);
    }
}

register_primitive_type_handler('string', "StringHandler");
$string = 'hello, world';

print $string->slice(6);
