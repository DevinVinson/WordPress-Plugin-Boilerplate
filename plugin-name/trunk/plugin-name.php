<?php

/**
 * Short Description (no period for file headers)
 *
 * Long Description.
 *
 * @package   Plugin_Name
 * @author    Your Name or Company Name <email@domain.com>
 * @license   GPL-2.0+
 * @link      http://exmaple.com/plugin-name
 * @copyright 2014 Your Name or Company Name
 *
 * @wordpress-plugin
 * Plugin Name:       Plugin Name
 * Plugin URI:        http://example.com/plugin-name
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress dashboard.
 * Version:           1.0.0
 * Author:            Your Name or Your Company
 * Author URI:        http://example.com
 * Text Domain:       plugin-name-locale
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Define the current stable version of the plugin
if ( ! defined( 'PLUGIN_NAME_VER' ) ) {
	define( 'PLUGIN_NAME_VER', '1.0.0' );
}

/**
 * Includes the plugin activation class that runs during plugin activation.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name-activator.php';

/**
 * Includes the plugin deactivation class that runs during plugin deactivation.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name-deactivator.php';

/** This action is documented in includes/class-plugin-name-activator.php */
register_activation_hook( __FILE__, array( 'Plugin_Name_Activator', 'activate' ) );

/** This action is documented in includes/class-plugin-name-deactivator.php */
register_activation_hook( __FILE__, array( 'Plugin_Name_Deactivator', 'deactivate' ) );

add_action( 'admin_init', 'plugin_name_admin_init' );
/**
 * Initializes the Dashboard-specific functionality of the plugin.
 *
 * When the admin_init hook is fired, initializes the Dashboard-specific functionality
 * of the plugin by injecting an instance of Plugin_Name_Admin into the
 * Plugin_Name_Admin_Loader then executes the functionality.
 *
 * @since    1.0.0
 */
function plugin_name_admin_init() {

	/**
	 * Includes the class responsible for defining the core functionality of the
	 * dashboard-specific part of the plugin
	 */
	require_once plugin_dir_path( __FILE__ ) . 'admin/class-plugin-name-admin.php';

	/**
	 * Includes the class responsible for registering all of the Plugin_Name_Admin functions
	 * with their appropriate callbacks.
	 */
	require_once plugin_dir_path( __FILE__ ) . 'admin/class-plugin-name-admin-loader.php';

	$admin_loader = new Plugin_Name_Admin_Loader();
	$admin_loader->run( new Plugin_Name_Admin() );

}

add_action( 'plugins_loaded', 'plugin_name_plugin_loaded' );
/**
 * Initializes the public-facing functionality of the plugin.
 *
 * When the plugins_loaded hook is fired, initializes the public-facing
 * functionality of the plugin by injecting an instance of Plugin_Name_Admin
 * into the Plugin_Name_Admin_Loader then executes the functionality.
 *
 * @since    1.0.0
 */
function plugin_name_plugin_loaded() {

	/**
	 * Includes the class responsible for defining the core functionality of
	 * the public-facing part of the plugin
	 */
	require_once plugin_dir_path( __FILE__ ) . 'public/class-plugin-name-public.php';

	/**
	 * Includes the class responsible for registering all of the Plugin_Name_Public
	 * functions with their appropriate callbacks.
	 */
	require_once plugin_dir_path( __FILE__ ) . 'public/class-plugin-name-public-loader.php';


	$loader = new Plugin_Name_Public_Loader();
	$loader->run( new Plugin_Name_Public() );

}
