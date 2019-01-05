<?php


// using namesapces to isolate functions 
// we should have all our code exist in namespaces
// we should build out logic in functions and add those functions(methods)
// to scalar type objects

namespace Type\Str {

    function length($string)
    {
        return strlen($string);
    }
}

namespace Type\Obj {

    function getObject()
    {
        return new \stdClass();
    }
}

// call isolated functions 
// namespace {

//     print Type\String\length('hello, world') . "\n";

//     print_r(Type\Object\getObject());
// }
