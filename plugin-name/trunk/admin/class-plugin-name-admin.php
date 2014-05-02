<?php

/**
 * Define a short description for what this class does.
 *
 * @since   x.x.x
 * @package TODO
 */

/**
 * Define a short description for what this class does.
 *
 * Define a longer description for the purpose of this class.
 *
 * @package   TODO
 * @author    Your Name <your@email.com>
 * @license   GPL-2.0+
 * @link      URL
 * @copyright 2014 Your Name of Your Company Name
 */
class Plugin_Name_Admin {

	/**
	 * Short description. (use period)
	 *
	 * Long description.
	 *
	 * @since    1.0.0
	 * @link     URL
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Admin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Admin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		 wp_enqueue_style( 'plugin-name-admin', plugin_dir_url( __FILE__ ) . 'css/plugin-name-admin.css', array(), PLUGIN_NAME_VER, 'all' );

	}

	/**
	 * Short description. (use period)
	 *
	 * Long description.
	 *
	 * @since    1.0.0
	 * @link     URL
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Admin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Admin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( 'plugin-name-admin', plugin_dir_url( __FILE__ ) . 'js/plugin-name-admin.js', array( 'jquery' ), PLUGIN_NAME_VER, FALSE );

	}

}
