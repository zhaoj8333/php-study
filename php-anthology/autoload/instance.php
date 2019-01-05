<?php

function instance($class)
{
	if (class_exists($class, false)) {
		return new $class;
	}

	if (function_exists('__autoload')) {
		__autoload($class);
	}
}
