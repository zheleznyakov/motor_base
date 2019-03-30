<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 27.03.19
 * Time: 16:34
 */

class User
{
    private static $id = 'Zheleznyakov';
    private $name = "Andrey";
    public static function getUser()
    {
        return self::$id;
    }
};
