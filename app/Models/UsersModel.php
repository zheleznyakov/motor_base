<?php
/**
 * Created by PhpStorm.
 * UsersModel: andrey
 * Date: 27.03.19
 * Time: 16:34
 */
namespace Application\Models;

use Application\Classes\DB;

class UsersModel extends AbstractModel
{
    protected static $table = "users";

    public static function findByEmail($email)
    {
        $sql = 'SELECT FROM '.self::$table. ' WHERE email=:email';
        $db = new DB();
        $db->setClassName(get_called_class());
        return $db->query($sql,[':email'=>$email]);

    }
};
