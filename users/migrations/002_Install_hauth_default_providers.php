<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Migration_Install_hauth_default_providers extends Migration
{

    /**
     * @var Array Providers to enter
     */
    private $providers = array(
        'OpenID' => array('key' => NULL, 'secret' => NULL),
        'Yahoo' => array('key' => '', 'secret' => ''),
        'AOL' => array('key' => NULL, 'secret' => NULL),
        'Google' => array('key' => '', 'secret' => ''),
        'Facebook' => array('key' => '', 'secret' => ''),
        'Twitter' => array('key' => '', 'secret' => ''),
        'Live' => array('key' => '', 'secret' => ''),
        'LinkedIn' => array('key' => '', 'secret' => ''),
        'Foursquare' => array('key' => '', 'secret' => ''),
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
        foreach ($this->providers as $provider => $keys)
        {
            if ($keys['key'] === NULL)
            {
                $this->db->insert($this->table_name, array('provider' => $provider));
            }
            else
            {
                $this->db->insert($this->table_name, array('provider' => $provider, 'key' => $keys['key'], 'secret' => $keys['secret']));
            }
        }
        $this->db->where(array('provider' => 'Facebook'));
        $this->db->update($this->table_name, array('scope' => 'email'));
    }

    /**
     * Migrate to the previous version
     *
     * @return void
     */
    public function down()
    {
        foreach ($this->providers as $provider => $keys)
        {
            $this->db->delete($this->table_name, array('provider' => $provider));
        }
    }

    //--------------------------------------------------------------------
}
