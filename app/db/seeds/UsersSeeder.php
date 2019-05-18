<?php


use Phinx\Seed\AbstractSeed;

class UsersSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = [
          ['email'=>'zhelezny.andrey@gmail.com',
          'password'=>'$argon2i$v=19$m=1024,t=2,p=2$M0o3QW44T1cyVWJJOUx2MQ$t/Oc0yW3uvSzFSqCsZzYssONmgDpS/tOmR5mIcUWwh0',
          'name'=>'root',
          'invitation'=>'',
          'group'=>1],

            ['email'=>'zhelezny.andrey@yandex.ru',
                'password'=>'',
                'name'=>'andrey',
                'invitation'=>'',
                'group'=>0],
            ['email'=>'zhelezny.andrey@mail.ru',
                'password'=>'',
                'name'=>'Ivan',
                'invitation'=>'',
                'group'=>0],
            ['email'=>'andrey@itworkclub.ru',
                'password'=>'',
                'name'=>'Сергей',
                'invitation'=>'',
                'group'=>0],
            ['email'=>'test@test.com',
                'password'=>'',
                'name'=>'Илья Петрович',
                'invitation'=>'',
                'group'=>0],
            ['email'=>'test@microsoft.com',
                'password'=>'',
                'name'=>'Константин Дмитриевич',
                'invitation'=>'',
                'group'=>1],
        ];
        $table = $this->table('users');
        $table->insert($data);
        $table->save();
    }
}
