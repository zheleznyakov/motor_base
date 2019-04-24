<?php


namespace Application\Classes;
use PDO;

/**
 * Class DB обеспечивает связь с базой данных приложения
 * @package Application\Classes
 */
class DB
{
    private $dbh;
    private $className = 'stdClass';

    /**
     * DB constructor. Создает экземпляр класса PDO для работы с базой данных
     */
    public function __construct()
    {
        $this->dbh = new PDO('mysql:dbname=motors_development_db;host=localhost','phpmyadmin','admin');
    }

    /**
     * @param $name имя класса (тип), который необходимо возвращать при запросе query
     */
    public function setClassName($name)
    {
        $this->className = $name;
    }

    /**
     * @param string $sql Строка подготовленного SQL запроса
     * @param array $params [optional] Параметры, передаваемые в SQL запрос
     * @return object
     */
    public function query($sql, $params=[])
    {
        var_dump($sql);
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_CLASS,$this->className);
    }

}