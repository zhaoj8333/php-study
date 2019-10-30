<?php

/**
 *
 */
class SuperMan
{

    protected $power;

    function __construct()
    {
        $this->power = new Flight(999, 100);

        // $this->power = new Force(100);
        //
        // $this->power = new Shot(100, 200, 300);
    }
}


class Flight
{
    protected $speed;
    protected $holdtime;
    public function __construct($speed, $holdtime) {}
}

class Force
{
    protected $force;
    public function __construct($force) {}
}

class Shot
{
    protected $atk;
    protected $range;
    protected $limit;
    public function __construct($atk, $range, $limit) {}
}
