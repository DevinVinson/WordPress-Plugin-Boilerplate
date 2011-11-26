<?php
/*
Plugin Name: TODO
Plugin URI: TODO
Description: TODO
Version: 1.0
Author: TODO
Author URI: TODO
License:

    Copyright 2011 TODO (email@domain.com)

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

// TODO: rename this class to a proper name for yuour plugin
class TODO {
	 
	/*--------------------------------------------*
	 * Constructor
	 *--------------------------------------------*/
	
	/**
	 * Initializes the plugin by setting localization, filters, and administration functions.
	 */
	function __construct() {
	
	    // Define constants used throughout the plugin
	    $this->init_plugin_constants();
  
		load_plugin_textdomain( PLUGIN_LOCALE, false, dirname( plugin_basename( __FILE__ ) ) . '/lang' );
		
	    /*
	     * TODO:
	     * Define the custom functionality for your plugin. The first parameter of the
	     * add_action/add_filter calls are the hooks into which your code should fire.
	     *
	     * The second parameter is the function name located within this class. See the stubs
	     * later in the file.
	     *
	     * For more information: 
	     * http://codex.wordpress.org/Plugin_API#Hooks.2C_Actions_and_Filters
	     */
	    add_action( 'TODO', array( $this, 'action_method_name' ) );
	    add_filter( 'TODO', array( $this, 'filter_method_name' ) );

	} // end constructor
	
	/*--------------------------------------------*
	 * Core Functions
	 *---------------------------------------------*/
	
	/**
 	 * Note:  Actions are points in the execution of a page or process
	 *        lifecycle that WordPress fires.
	 */
	function action_method_name() {
    	// TODO define your action method here
	} // end action_method_name
	
	/**
	 * Note:  Filters are points of execution in which WordPress modifies data
	 *        before saving it or sending it to the browser.
	 */
	function filter_method_name() {
	    // TODO define your filter method here
	} // end filter_method_name
  
	/*--------------------------------------------*
	 * Private Functions
	 *---------------------------------------------*/
   
	/**
	 * Initializes constants used for convenience throughout 
	 * the plugin.
	 */
	private function init_plugin_constants() {
	
		/* TODO
		 * 
		 * This provides the unique identifier for your plugin used in
		 * localizing the strings used throughout.
		 * 
		 * For example: wordpress-widget-boilerplate-locale.
		 */
		if ( !defined( 'PLUGIN_LOCALE' ) ) {
		  define( 'PLUGIN_LOCALE', 'plugin-name-locale' );
		} // end if
		
		/* TODO
		 * 
		 * Define this as the name of your plugin. This is what shows
		 * in the Widgets area of WordPress.
		 * 
		 * For example: WordPress Widget Boilerplate.
		 */
		if ( !defined( 'PLUGIN_NAME' ) ) {
		  define( 'PLUGIN_NAME', 'Plugin Name' );
		} // end if
		
		/* TODO
		 * 
		 * this is the slug of your plugin used in initializing it with
		 * the WordPress API.
		 
		 * This should also be the
		 * directory in which your plugin resides. Use hyphens.
		 * 
		 * For example: wordpress-widget-boilerplate
		 */
		if ( !defined( 'PLUGIN_SLUG' ) ) {
		  define( 'PLUGIN_SLUG', 'plugin-name-slug' );
		} // end if
	
	} // end init_plugin_constants
	
	/**
	 * Helper function for registering and loading scripts and styles.
	 *
	 * @name	The 	ID to register with WordPress
	 * @file_path		The path to the actual file
	 * @is_script		Optional argument for if the incoming file_path is a JavaScript source file.
	 */
	private function load_file( $name, $file_path, $is_script = false ) {
		$url = WP_PLUGIN_URL . $file_path;
		$file = WP_PLUGIN_DIR . $file_path;
		if( file_exists( $file ) ) {
			if( $is_script ) {
				wp_register_script( $name, $url );
				wp_enqueue_script( $name );
			} else {
				wp_register_style( $name, $url );
				wp_enqueue_style( $name );
			} // end if
		} // end if
	} // end _load_file
  
} // end class
// TODO: update the instantiation call of your plugin to the name given at the class definition
new TODO();
?>