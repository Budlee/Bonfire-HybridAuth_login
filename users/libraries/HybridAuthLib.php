<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require APPPATH.'modules/users/third_party/hybridauth/Hybrid/Auth.php';

class HybridAuthLib extends Hybrid_Auth
{

    /**
     * A pointer to the CodeIgniter instance.
     *
     * @access private
     *
     * @var object
     */
    private $ci;

    function __construct($config = array())
    {
        $this->ci = & get_instance();
        $this->ci->load->helper('url_helper');
        $this->ci->load->model('users/user_model');
        $loc_config = module_config('users');

        $config = $this->ci->user_model->get_config();
        //TODO:introduce debug mode
//        $config['debug_mode'] = $loc_config['debug_mode'];
//        $config['debug_file'] = $loc_config['debug_file'];
        $config['base_url'] = site_url() . $loc_config['base_url'];

        parent::__construct($config);

        log_message('debug', 'HybridAuthLib Class Initalized');
    }

    public static function providerEnabled($provider)
    {
        return isset(parent::$config['providers'][$provider]) && parent::$config['providers'][$provider]['enabled'];
    }
}

/* End of file HybridAuthLib.php */
/* Location: ./application/libraries/HybridAuthLib.php */
