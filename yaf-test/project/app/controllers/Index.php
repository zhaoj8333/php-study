<?php

// namespace controllers;

use \Yaf\Controller_Abstract;

class IndexController extends Controller_Abstract
{
    protected $arr = [];

    /**
     * [indexAction hello, world]
     *
     * @return [void]
     */
    public function indexAction(): void
    {
        // var_dump(Yaf\VERSION);
        // var_dump(Yaf\ENVIRON);
        // var_dump(Yaf\ERR\STARTUP_FAILED);
        // var_dump(Yaf\ERR\ROUTE_FAILED);
        // var_dump(Yaf\ERR\DISPATCH_FAILED);
        $this->getView()->assign("content", "hello yaf");
    }

    /**
     * [testAction testAction]
     *
     * @author   zhaojun
     * @datetime 2018-08-12T16:12:46+0800
     *
     * @return [void]
     */
    public function testAction(): void
    {
        var_dump(YAF_VERSION);
    }

}
