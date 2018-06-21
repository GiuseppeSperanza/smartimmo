<?php


use Phinx\Migration\AbstractMigration;

class AddNewContactMigration extends AbstractMigration
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
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $users = $this->table('contatti');
        $users->addColumn('Nome', 'string', ['limit' => 40,'null' => false])
              ->addColumn('Cognome', 'string', ['limit' => 40,'null' => false])
              ->addColumn('Email', 'string', ['limit' => 100,'null' => false])
              ->addColumn('Telefono', 'string', ['limit' => 10, 'null' => false])
              ->addColumn('Note', 'text', ['null' => false])
              ->addColumn('Privacy', 'string', ['limit' => 10,'null' => false])
              ->addColumn('Created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
              ->create();
    }

    public function up()
    {
        
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
         
    }
}
