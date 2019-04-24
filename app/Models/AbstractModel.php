<?php


namespace Application\Models;
use Application\Classes\DB;

/**
 * Class AbstractModel Работа с базой данных
 * @package Application\Models
 */
abstract class AbstractModel
{
    /**
     * @var Имя таблицы
     */
    protected static $table;


    /**
     * @return string Название таблицы
     */
    public static function getTable()
    {
        return static::$table;
    }

    /**
     * @return object Возвращает все элементы таблицы
     */
    public static function getAll()
    {
        //узнаем имя класса, для которого вызвана функция
        $class = get_called_class();
        $sql = 'SELECT * FROM ' .static::getTable();
        $db = new DB();
        // передадим имя класса, для того, чтобы db вернула ответ нужного нам типа
        $db->setClassName($class);
        return $db->query($sql);
    }

    /**
     * @param int $id ключ, по котором нужно сделать выборку
     * @return object
     */
    public static function getOneByPk($id)
    {

        $sql = 'SELECT * FROM ' .static::getTable().' WHERE id=:id';
        $db = new DB();
        $db->setClassName(get_called_class());
        return $db->query($sql,[':id'=>$id]);
    }
}