<?php
// include
// require
// include_once
// require_once

// include 'erro.php'; // failed to open stream: No such file or directory in ...: the script goes on
// require 'erro.php';    // require(): Failed opening required 'erro.php': the script terminated


echo "require once: \n";

require 'error.php';

echo "include: \n";

include 'error.php';

echo "include once\n";

include_once 'error.php'; //did not print

require_once 'error.php'; // did not print

require 'error.php'; // error.php

include 'test.html'; // also we can include any files without any php

// include 'php.conf';

// include '../../php56/src/ltmain.sh'; // including any files without php
// will display the content of the file
