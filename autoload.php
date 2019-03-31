<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 31.03.19
 * Time: 16:51
 */
spl_autoload_register(function($class){

    $classParts = explode('\\',$class);
    if (!empty($classParts))
    {
        $classParts[0] = __DIR__;
    }
    $path = implode(DIRECTORY_SEPARATOR,$classParts);
    $path = $path. '.php';

    if (file_exists($path)) {
        require $path;
    }

});