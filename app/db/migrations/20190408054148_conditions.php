<?php


use Phinx\Migration\AbstractMigration;

class Conditions extends AbstractMigration
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
    public function change()
    {
        $table = $this->table('conditions');
        $table->addColumn('title','string',['limit'=>255])
            ->create();

        $table=$this->table('state_changes');
        $table->addColumn('data','timestamp',['default'=>'CURRENT_TIMESTAMP'])
            ->addColumn('motor_id','integer',['signed'=>false])
            ->addColumn('condition_id','integer')
            ->addColumn('comment','text')
            ->addForeignKey('motor_id','motors','id')
            ->addForeignKey('condition_id','conditions','id')
            ->create();

    }
}
