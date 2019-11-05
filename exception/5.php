<?php

error_reporting(E_ALL);

try {

    require __DIR__ . '/lib.php';
} catch (\Exception $e) {
    var_export($e);
} catch (\Error $e) {
    var_export($e);
}
