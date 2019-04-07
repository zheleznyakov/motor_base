<?php


use Phinx\Seed\AbstractSeed;

class PlacesSeeder extends AbstractSeed
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
        ['title'=>'ДСЗ1'], ['title'=>'ДСЗ2'],['title'=>'Jonnson'],['title'=>'Склад ДСЗ1'],
            ['title'=>'Склад ДСЗ2']

        ];
        $table = $this->table('objects');
        $table->insert($data);
        $table->save();

    }
}
