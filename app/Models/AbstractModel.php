<?php


namespace Application\Models;


abstract class AbstractModel
{
    protected static $table;
    public static function getTable()
    {
        return static::$table;
    }

}