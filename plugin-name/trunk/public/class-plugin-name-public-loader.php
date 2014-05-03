<?php

/**
 * Define a short description for what this class does (no period)
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public
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
 * @subpackage Plugin_Name/public
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Public_Loader {

	/**
	 * Short description. (use period)
	 *
	 * Long description.
	 *
	 * @since    1.0.0
	 * @param    type    $plugin_name_public    A reference to the Plugin_Name_Public class that defines the functions for the hooks.
	 */
	public function run( Plugin_Name_Public $plugin_name_public ) {

		/**
		 * This function is used to define the various hooks that are used in the
		 * public-facing side of the plugin. This is achieved via dependency injection
		 * by passing an instance of Plugin_Name_Public into this class.
		 *
		 * Each hook then corresponds to a public function defined within the Plugin_Name_Public
		 * class.
		 */

		 add_action( 'wp_enqueue_scripts', array( $plugin_name_public, 'enqueue_styles' ) );
		 add_action( 'wp_enqueue_scripts', array( $plugin_name_public, 'enqueue_scripts' ) );

	}

}
