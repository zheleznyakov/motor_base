<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 27.03.19
 * Time: 16:58
 */

class View
{

    public function display($template)
    {
        include __DIR__.'/../Views/'.$template;
    }
}