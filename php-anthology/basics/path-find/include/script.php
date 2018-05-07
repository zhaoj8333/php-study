<?php

// If script.php is the page we’re viewing,
// this command will correctly include another.php
//
//  if index.php is the page we’re viewing, and it includes
// script.php, this command will fail
//
//  because the location of another.php is cal-culated relative
//  to the location of index.php, not relative to script.php.
//
//  to avoid this, we can use the real path of the included scripts

include './include/another.php';

echo "script.php\n";