<?php

// high light the source code of php
// highlight_file('./file.php');


$srcCode = file_get_contents('/home/zhaojun/www/php-study/composer/vendor/gitonomy/gitlib/src/Gitonomy/Git/Blame.php');

highlight_string($srcCode);