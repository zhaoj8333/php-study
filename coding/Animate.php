<?php

/**
 * @Author: zhaojun_cd
 * @Date:   2018-08-04 16:11:37
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-08-04 16:16:23
 */
/**
 *
 */
// class UIComponent
// {
//     public function repaint($animate = true)
//     {

//     }

// }

// $component = new UIComponent();
// $component->repaint(false);
//
//
class UIComponent
{
    public function repaint(Animate $animate)
    {

    }

}

/**
 *
 */
class Animate
{
    public $animate;

    public function __construct($animate = true)
    {
        $this->animate = $animate;
    }

}

$component = new UIComponent();
$component->repaint(new Animate(false));