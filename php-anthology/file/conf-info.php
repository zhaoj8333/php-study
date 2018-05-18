<?php

$confFile = 'conf.ini';

$conf = parse_ini_file($confFile, true);

var_dump($conf);