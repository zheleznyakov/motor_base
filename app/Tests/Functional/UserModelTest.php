<?php


namespace Application\Tests\Functional;


use Application\Classes\DB;
use Application\Models\UsersModel;
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    public function testFindByEmail()
    {
        DB::debug(true);
        $db = DB::getInstance();

        UsersModel::setDB($db);
        $this->assertSame(true,$db->execute('TRUNCATE TABLE users'),
            "не удалось очистить таблицу users");


        $data =
            [':email'=>'zhelezny.andrey@gmail.com',
                ':password'=>'$argon2i$v=19$m=1024,t=2,p=2$M0o3QW44T1cyVWJJOUx2MQ$t/Oc0yW3uvSzFSqCsZzYssONmgDpS/tOmR5mIcUWwh0',
                ':name'=>'root',
                ':invitation'=>'',
                ':group'=>1]
        ;
        $sql = 'INSERT INTO `users` (`email`,`password`,`name`,`invitation`,`group`) 
                            VALUES (:email,:password,:name,:invitation,:group)';
        $this->assertSame(true, $db->execute($sql,$data), "не удалось добавить пользователя");


        $model = UsersModel::findByEmail('zhelezny.andrey@gmail.com');
        $this->assertSame('root',$model->name,"имя найденного пользователя не соответсвует ожиданию");

    }
}