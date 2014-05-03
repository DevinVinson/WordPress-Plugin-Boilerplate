<?php

/**
 * Define a short description for what this class does.
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public
 */

/**
 * Define a short description for what this class does.
 *
 * Define a longer description for the purpose of this class.
 *
 * @author    Your Name <your@email.com>
 * @license   GPL-2.0+
 * @link      URL
 * @copyright 2014 Your Name or Company Name
 */
class Plugin_Name_Public_Loader {

	/**
	 * Short description. (use period)
	 *
	 * Long description.
	 *
	 * @since    1.0.0
	 * @param    type    $plugin_name_public    TODO
	 */
	public function run( $plugin_name_public ) {

		/**
		 * This function is used to define the various hooks that are used in the
		 * public-facing side of the plugin. This is achieved via dependency injection
		 * by passing an instance of Plugin_Name_Public into this class.
		 *
		 * Each hook then corresponds to a public function defined within the Plugin_Name_Public
		 * class.
		 *
		 * For example:
		 *
		 * add_filter( 'the_content', array( $plugin_name_public, 'display_the_content' ) );
		 */

	}

}