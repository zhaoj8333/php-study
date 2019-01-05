<?php

echo "string";

ini_set('max_execution_time', 5);
set_time_limit(5);

ignore_user_abort();

$i = 0;
while (true) {
    $i ++;
    echo $i, "\n";
}
