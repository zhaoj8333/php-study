#!/usr/local/php72/bin/php
<?php

ignore_user_abort(true);

set_time_limit(0);

ini_set('memory_limit', '512M');

do {
    sleep(1);
    echo time(), "\n";
} while (true);
