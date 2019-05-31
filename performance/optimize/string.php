<?php

echo "hi" . " there. " . "how are " . "you?" . "\n"; // slow
echo "hi" , " there. ", "how are", " you?\n"; // faster

$name = '一点都不';

echo 'hi, there ' . $name . "\n"; // slow
echo "hi, there, $name \n"; // faster


// the performance gains minimal above

