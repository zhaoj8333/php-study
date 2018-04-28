<?php

//namespace controllers;


class IndexController extends \Yaf\Controller_Abstract
{
    protected $arr = [];

    /**
     * [indexAction description]
     *
     * @return [type] [description]
     */
    public function indexAction(): void
    {
        $this->getView()->assign("content", "hello yaf");
    }

}