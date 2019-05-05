<?php


namespace Application\Classes;
use PDO;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * Class DB обеспечивает связь с базой данных приложения
 * @package Application\Classes
 */
class DB
{
    private static $instance;
    private $dbh;
    private $className = 'stdClass';
    private static $debug = false;


    /**
     * DB constructor. Создает экземпляр класса PDO для работы с базой данных
     */
    private function __construct()
    {
        if (!self::$debug)
            $this->dbh = new PDO(
                'mysql:dbname=motors_development_db;host=localhost',
                'phpmyadmin',
                'admin'
            );
        if  (self::$debug)
            $this->dbh = new PDO(
                'mysql:dbname=motors_testing_db;host=localhost',
                'phpmyadmin',
                'admin'
            );
    }

    public static function getInstance()
    {
        if (self::$instance === null)
        {
            self::$instance = new DB();
        }
        return self::$instance;


    }

    public static function debug($d)
    {
        if ($d==true)
            self::$debug = true;
        if ($d==false)
            self::$debug = false;
    }

    /**
     * @param string $name имя класса (тип), который необходимо возвращать при запросе query
     */
    public function setClassName($name)
    {
        $this->className = $name;
    }

    /**
     * Функция возвращает результат запроса к безе данных
     * @param string $sql Строка подготовленного SQL запроса
     * @param array $params [optional] Параметры, передаваемые в SQL запрос
     * @param string $className тип возвращаемого значения, по умолчанию stdClass
     * @return array
     */
    public function query($sql, $params=[],$className='stdClass')
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_CLASS,$className);
    }

    public function execute($sql, $params=[]) :bool
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

}