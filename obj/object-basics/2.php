<?php

$obj1 = new stdClass();
var_dump($obj1);

$obj2 = new class{}; // anonymous class
var_dump($obj2);

$obj3 = (object)[];  // cast empty array to object, stdClass
var_dump($obj3);

/* var_dump($obj1 == $obj3); // true */
/* var_dump($obj1 === $obj3);// false */
/* var_dump($obj1 == $obj2); */

/* echo json_encode( */
/*     [ */
/*         $obj1, */
/*         $obj2, */
/*         $obj3, */
/*     ] */
/* ); */

/* $obj4 = (object)[ */
/*     'one' => 'one', */
/*     'tow' => 2, */
/* ]; */
/* var_dump($obj4); */

/* $args = [ */
/*     'a' => 'a', */
/*     'b' => 'b', */
/* ]; */
/* $std = new stdClass($args); */
/* var_dump($std); */
