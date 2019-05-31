<?php

    $mongodb = new MongoDB\Driver\Manager('mongodb://127.0.0.1:27017');
// var_dump($mongodb);
    var_dump(MONGODB_VERSION, MONGODB_STABILITY);
