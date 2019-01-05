<?php

/**
 * @Author: zhaojun_cd
 * @Date:   2018-08-04 15:51:10
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-08-04 15:52:22
 */

class NoElse
{
    public function createPost($request)
    {
        $entity = new Post();
    }

}


$noelse = new NoElse();

var_dump($noelse->createPost(''));