#!/usr/local/php72/bin/php
<?php

// var_dump(STDIN);

// $cont = file_get_contents('php://stdin');
// var_dump($cont);

/* file_put_contents('php://stdout', "stdout\n"); */
/* file_put_contents('php://stderr', "error\n"); */

/* $f = fopen('php://stdout', 'w'); */
/* fwrite($f, "output from php\n"); */
/* fclose($f); */

//var_dump($f);

/* $f = fopen('php://stderr', 'w'); */
/* fwrite($f, "error from php\n"); */
/* fclose($f); */

/* $stdin = fopen('php://stdin', 'r'); */

/* $line = trim(fgets(STDIN)); */
/* fscanf(STDIN, "%d\n", $number); */
/* var_dump($number); */

$stdout = fopen('php://stdout', 'w');

