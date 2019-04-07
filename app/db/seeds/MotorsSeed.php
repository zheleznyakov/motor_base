<?php


use Phinx\Seed\AbstractSeed;

class MotorsSeed extends AbstractSeed
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
            ['power'=>'11.1', 'description'=>'Мотор ABB на лапах'],
            ['power'=>'132.25', 'description'=>'Мотор для насоса'],
            ['power'=>'22', 'description'=>'Мотор для грохота']


        ];
        $table = $this->table('motors');
        $table->insert($data);
        $table->save();
    }
}
