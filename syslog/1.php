#!/usr/local/php72/bin/php
<?php

$syslog = openlog('test', NULL, LOG_LOCAL4);
syslog(LOG_INFO, 'syslog test message');
closelog();
var_dump($syslog);
