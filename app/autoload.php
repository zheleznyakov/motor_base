<?php
/**
 * Created by PhpStorm.
 * UsersModel: andrey
 * Date: 31.03.19
 * Time: 16:51
 */
spl_autoload_register(function($class){

    $classParts = explode('\\',$class); //разделим namespace по символу \

    if (!empty($classParts))
    {
        $classParts[0] = __DIR__ ;// заменим Application на текущую дирректорию, в которой лежит этот скрипт
    }
    $path = implode(DIRECTORY_SEPARATOR,$classParts); // объединим массив в строку
    $path = $path. '.php';

    if (file_exists($path)) {
        require $path;
    }

});