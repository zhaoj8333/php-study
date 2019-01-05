<?php

$str = '$afsafdf$';

var_dump(preg_match('/\$[a-zA-Z0-9]+\$/', $str, $arr));

var_dump($arr);
