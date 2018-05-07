<?php
$script = file_get_contents('test.php');

$tokens = token_get_all($script);

var_dump($tokens);