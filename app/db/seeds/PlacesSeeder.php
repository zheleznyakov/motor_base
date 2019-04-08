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

        $data = [
            ['object_id'=>1,'title'=>'Грохот 1'],
            ['object_id'=>1, 'title'=>'ЛК-5'],
            ['object_id'=>1, 'title'=>'ЛК-6'],
            ['object_id'=>1, 'title'=>'Главный насос подачи'],
            ['object_id'=>2, 'title'=>'ЛК-10'],
            ['object_id'=>2, 'title'=>'ЛК-23'],
        ];
        $table = $this->table('places');
        $table->insert($data);
        $table->save();

    }
}
