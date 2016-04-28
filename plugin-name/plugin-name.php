<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Plugin_Name
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress Plugin Boilerplate
 * Plugin URI:        http://example.com/plugin-name-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Your Name or Your Company
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-name
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
define( 'PLUGIN_NAME_VERSION', '1.0.0' );
define( 'PLUGIN_NAME_SLUG', 'plugin-name' );
/**
 * Activation hooks
 */
register_activation_hook( __FILE__, array( 'Plugin_Name_Activator', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Plugin_Name_Deactivator', 'deactivate' ) );

/**
 * Autoloader function
 *
 * Will search both plugin root and includes folder for class. Provides a filter for additional paths
 *
 * @param string $class_name
 */
if ( ! function_exists( 'plugin_name_autoloader' ) ):
	function plugin_name_autoloader( $class_name ) {
		$file      = 'class-' . str_replace( '_', '-', strtolower( $class_name ) ) . '.php';
		$base_path = plugin_dir_path( __FILE__ );

		$paths = apply_filters( 'plugin_name_autoloader_paths', array(
			$base_path . $file,
			$base_path . 'includes/' . $file,
			$base_path . 'public/' . $file,
		) );
		foreach ( $paths as $path ) {

			if ( is_readable( $path ) ) {
				include_once( $path );

				return;
			}
		}
	}

	spl_autoload_register( 'plugin_name_autoloader' );
endif;

if ( ! function_exists( 'plugin_name_init' ) ):

	/**
	 * Function to initialize plugin
	 */
	function plugin_name_init() {
		plugin_name()->run();
	}

	add_action( 'plugins_loaded', 'plugin_name_init' );

endif;
if ( ! function_exists( 'plugin_name' ) ):

	/**
	 * Function wrapper to get instance of plugin
	 *
	 * @return Plugin_Name
	 */
	function plugin_name() {
		return Plugin_Name::get_instance();
	}

endif;

