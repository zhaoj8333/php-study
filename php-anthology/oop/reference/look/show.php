<?php

require 'Look.php';
require 'Output.php';

$look = new Look();
$output = new Output($look);

$look->setColor('red');
$look->setSize('large');

echo $output->display();