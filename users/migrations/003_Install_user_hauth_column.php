<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Migration_Install_user_hauth_column extends Migration
{

    /**
     * @var Array Field definitions for the migration
     */
    private $fields = array(
        'hauth_provider' => array(
            'type' => 'VARCHAR',
            'constraint' => 45,
            'null' => TRUE,
            
        ),
    );

    /**
     * The name of the Hybrid auth table
     *
     * @var String
     */
    private $table_name = 'users';

    /**
     * Migrate to this version
     *
     * @return void
     */
     public function up()
    {
        $this->dbforge->add_column($this->table_name, $this->fields);
    }

    /**
     * Migrate to the previous version
     *
     * @return void
     */
    public function down()
    {
        foreach ($this->fields as $columnName => $columnDef)
        {
            $this->dbforge->drop_column($this->table_name, $columnName);
        }
    }

    //--------------------------------------------------------------------
}
