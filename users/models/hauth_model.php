<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Bonfire
 *
 * An open source project to allow developers get a jumpstart their development of CodeIgniter applications
 *
 * @package   Bonfire
 * @author    Bonfire Dev Team
 * @copyright Copyright (c) 2011 - 2013, Bonfire Dev Team
 * @license   http://guides.cibonfire.com/license.html
 * @link      http://cibonfire.com
 * @since     Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Settings Module Model
 *
 * Provides methods to retrieve and update settings in the database
 *
 * @package    Bonfire
 * @subpackage Modules_Settings
 * @category   Models
 * @author     Bonfire Dev Team
 * @link       http://guides.cibonfire.com/helpers/file_helpers.html
 *
 */
class Hauth_model extends BF_Model
{

	/**
	 * Name of the table
	 *
	 * @access protected
	 *
	 * @var string
	 */
	protected $table_name	= 'hybrid_auth_settings';

	/**
	 * Name of the primary key
	 *
	 * @access protected
	 *
	 * @var string
	 */
	protected $key			= 'id';

	/**
	 * Use soft deletes or not
	 *
	 * @access protected
	 *
	 * @var bool
	 */
	protected $soft_deletes	= FALSE;

	//--------------------------------------------------------------------
        
        public function __construct()
        {
            parent::__construct();
        }
        
        public function get_config()
        {
            $results = $this->db->get();
            $return_array['providers']= array();
            foreach ($results as  $provider)
            {
                $return_array['providers'][] = array($provider->provider => array(
                    'enabled' => ($provider->enabled == 1 ? TRUE : FALSE ), 
                    'keys' => array('id' => $provider->key, 'key' => $provider->key, 'secret' => $provider->secret),
                    'scope' => $provider->scope,
                    ));
            }
            return $return_array;
        }

}//end Settings_model
