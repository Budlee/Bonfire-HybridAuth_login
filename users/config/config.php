<?php defined('BASEPATH') || exit('No direct script access allowed');

$config['module_config'] = array(
	'description'	=> 'Allows users to exist in Bonfire.',
	'author'		=> 'Bonfire Team',
	'weights'		=> array(
		'settings'	=> 1,
	),
    'menus'	=> array(
		'settings'	=> 'users/settings/menu',
	),
    'name'          => 'lang:bf_menu_users',
    'base_url' => '/users/endpoint',
    'debug_mode' => (ENVIRONMENT == 'development'),
    'debug_file' => APPPATH . '/logs/hybridauth.log',
);