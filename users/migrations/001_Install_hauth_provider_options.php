<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Migration_Install_hauth_provider_options extends Migration
{

    /**
     * @var Array Field definitions for the migration
     */
    private $fields = array(
        'id' => array(
            'type' => 'INT',
            'unsigned' => TRUE,
            'auto_increment' => TRUE,
            'null' => FALSE,
        ),
        'provider' => array(
            'type' => 'VARCHAR',
            'constraint' => 45,
            'null' => FALSE,
        ),
        'enabled' => array(
            'type' => 'TINYINT',
            'constraint' => 1,
            'default' => '0',
        ),
        'key' => array(
            'type' => 'VARCHAR',
            'constraint' => 255,
            'null' => TRUE,
            'default' => 'NULL',
        ),
        'secret' => array(
            'type' => 'VARCHAR',
            'constraint' => 255,
            'null' => TRUE,
            'default' => 'NULL',
        ),
        //Used for Facebook only
        'scope' => array(
            'type' => 'VARCHAR',
            'constraint' => 255,
            'null' => TRUE,
            'default' => 'NULL',
        ),
    );

    /**
     * The name of the Hybrid auth table
     *
     * @var String
     */
    private $table_name = 'hybrid_auth_settings';

    /**
     * Migrate to this version
     *
     * @return void
     */
     public function up()
    {
        $this->dbforge->add_field($this->fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table($this->table_name);
        $data = array(
			'name'		=> 'hybridauth_enabled',
			'module'	=>	'users',
			'value'		=> 0
		);
        $this->db->insert('settings', $data);
    }

    /**
     * Migrate to the previous version
     *
     * @return void
     */
    public function down()
    {
        $this->dbforge->drop_table($this->table_name);
    
    }

    //--------------------------------------------------------------------
}
