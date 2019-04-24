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

    /**
     * DB constructor. Создает экземпляр класса PDO для работы с базой данных
     */
    public function __construct()
    {
        $dbh = new PDO('mysql:dbname=motors_development_db;host=localhost','phpmyadmin','admin');
    }

    /**
     * @param string $sql Строка подготовленного SQL запроса
     * @param array $params [optional] Параметры, передаваемые в SQL запрос
     * @return object
     */
    public function query($sql, $params=[])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_OBJ);
    }

}