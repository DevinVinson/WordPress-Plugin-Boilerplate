<?php

/**
 * Define a short description for what this class does (no period)
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 * @author     Your Name <email@example.com>
 * @license    GPL-2.0+
 * @link       http://example.com
 * @copyright  2014 Your Name or Company Name
 * @since      1.0.0
 */

/**
 * Define a short description for what this class does.
 *
 * Define a longer description for the purpose of this class.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Admin_Loader {

	/**
	 * Short description. (use period)
	 *
	 * Long description.
	 *
	 * @since    1.0.0
	 * @param    type    $plugin_name_admin    A reference to the Plugin_Name_Admin class that defines the functions for the hooks.
	 */
	public function run( Plugin_Name_Admin $plugin_name_admin ) {

		/**
		 * This function is used to define the various hooks that are used in the
		 * dashboard-specific side of the plugin. This is achieved via dependency injection
		 * by passing an instance of Plugin_Name_Admin into this class.
		 *
		 * Each hook then corresponds to a public function defined within the Plugin_Name_Admin
		 * class.
		 */

		 add_action( 'admin_enqueue_scripts', array( $plugin_name_admin, 'enqueue_styles' ) );
		 add_action( 'admin_enqueue_scripts', array( $plugin_name_admin, 'enqueue_scripts' ) );

	}

}
