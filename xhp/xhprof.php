<?php

function foo() {
	// test(false);
	return [
		'a',
		'b',
		'c'
	];
}

function test($bool) {
	if ($bool == false) {
		echo 'aaaa';
	}

	echo 'bbbb';
}

tideways_xhprof_enable(TIDEWAYS_XHPROF_FLAGS_MEMORY | TIDEWAYS_XHPROF_FLAGS_CPU | TIDEWAYS_XHPROF_FLAGS_MEMORY_ALLOC | TIDEWAYS_XHPROF_FLAGS_MEMORY_ALLOC_AS_MU);

foo();


$data = tideways_xhprof_disable();

var_dump($data);
file_put_contents('/tmp/tideways_xhprof/' . uniqid() . '.xhprof', serialize($data));
