<?php

class StringType extends SplString
{
    public function slice($start = 0, $length = null)
    {
        if ($length === null) {
            return new static(substr($this, $start));
        }

        return new static(substr($this, $start, $length));
    }
}


$string = new StringType('hello, world');

print $string->slice(5) . "\n";
