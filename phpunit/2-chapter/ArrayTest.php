<?php
use PHPUnit\Framework\TestCase;

class ArrayTest extends TestCase
{
    // Unit Tests are primarily written as a good practice to help developers
    // identify and fix bugs,
    // refactor code
    // serve as documentation for a unit of software under test.
    //
    // unit tests ideally should cover all the possible paths in a program.
    // One unit test usually covers one specific path in one function or method.
    // However a test method is not necessarily an encapsulated, independent entity. Often
    // there are implicit dependencies between test methods, hidden in the implementation
    // scenario of a test.
    public function testPushAndPop()
    {
        $arr = [];
        $this->assertEquals(0, count($arr));

        array_push($arr, "foo");
        $this->assertEquals("foo", $arr[count($arr) - 1]);
        $this->assertEquals(1, count($arr));

        $this->assertEquals("foo", array_pop($arr));
        $this->assertEquals(0, count($arr));
    }
}