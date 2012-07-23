<?php
/*
Plugin Name: TODO
Plugin URI: TODO
Description: TODO
Version: 1.0
Author: TODO
Author URI: TODO
Author Email: TODO
License:

  Copyright 2012 TODO (email@domain.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as 
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
  
*/


/** 
 * Init Plugin when is it Loaded
 * 
 * TODO: Replace PluginName with your new plugin name
 */
add_action( 'plugins_loaded', 'init_PluginName');

function init_PluginName(){
	require_once 'inc/index.class.php';
	new PluginName( plugin_basename(__FILE__) );
}



/**
 * Fired when the plugin is activated.
 *
 * @params	$network_wide	True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog 
 */
register_activation_hook( __FILE__, 'activate' );

function activate( $network_wide ) {
	// TODO define activation functionality here
} // end activate

/**
 * Fired when the plugin is deactivated.
 *
 * @params	$network_wide	True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog 
 */
register_deactivation_hook( __FILE__, 'deactivate' );

function deactivate( $network_wide ) {
	// TODO define deactivation functionality here		
} // end deactivate

?>