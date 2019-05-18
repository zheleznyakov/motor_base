<?php
/**
 * Created by PhpStorm.
 * UsersModel: andrey
 * Date: 27.03.19
 * Time: 16:34
 */
namespace Application\Models;

use Application\Classes\DB;
use phpDocumentor\Reflection\Types\Boolean;

class UsersModel extends AbstractModel
{
    protected static $table = "users";

    public $id;
    public $email;
    public $password;
    public $name;
    public $invitation;
    public $group;

    /**
     * Проверяет пароль на соответствие хешу
     * @param string $password
     * @return bool
     */
    public function verify(string $password):bool
    {
        return password_verify($password,  $this->password);
    }


    /**
     * Поиск пользователя по адресу эл.почты
     * @param string $email email адрес пользователя
     * @return UsersModel|null
     */
    public static function findByEmail($email)
    {
        $sql = 'SELECT * FROM '.self::$table. ' WHERE email=:email';

        $result = self::$db->query($sql,[':email'=>$email],get_called_class());
        if (!empty($result))
            return $result[0];
        return null;
    }

    /**
     * Возвращает всех пользователей сервиса
     * @return array|null массив UsersModel
     */
    public static function findAllUsers()
    {
        $sql = 'SELECT * FROM '.self::$table;

        $result = self::$db->query($sql,[],get_called_class());

        if (!empty($result))
            return $result;
        return null;
    }

};
