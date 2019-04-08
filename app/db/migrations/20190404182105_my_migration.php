<?php


use Phinx\Migration\AbstractMigration;

class MyMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up()
    {
        $table = $this->table('objects');
        $table->addColumn('title', 'string', ['limit' => 255])
            ->addIndex(['title'],['unique'=>true])
            ->create();

        $table = $this->table('places');
        $table->addColumn('object_id','integer')
            ->addColumn('title','string',['limit'=>255])
            ->addIndex(['object_id','title'],['unique'=>true])
            ->addForeignKey('object_id','objects','id')
            ->create();
    }
    public function down()
    {
        $this->table('places')->drop()->save();
        $this->table('objects')->drop()->save();
    }
}
