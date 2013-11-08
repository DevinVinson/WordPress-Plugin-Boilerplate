<?php
/**
 * The WordPress Plugin Boilerplate.
 *
 * A foundation off of which to build well-documented WordPress plugins that
 * also follow WordPress Coding Standards and PHP best practices.
 *
 * @package   Plugin_Name
 * @author    Your Name <email@example.com>
 * @license   GPL-2.0+
 * @link      http://example.com
 * @copyright 2013 Your Name or Company Name
 *
 * @wordpress-plugin
 * Plugin Name:       TODO
 * Plugin URI:        TODO
 * Description:       TODO
 * Version:           1.0.0
 * Author:            TODO
 * Author URI:        TODO
 * Text Domain:       plugin-name-locale
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/<owner>/<repo>
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


/*
 * TODO: Plugin name replacement
 *
 * - replace `class-plugin-name.php` with the name of the plugin's class file
 * - replace Plugin_Name with the name of the class defined in `class-plugin-name.php`
 * - replace `class-plugin-admin.php` with the name of the plugin's admin file
 * - replace Plugin_Name_Admin with the name of the class defined in `class-plugin-name-admin.php` 
 *
 */

$class_plugin_name_php = 'class-plugin-name.php';
$plugin_name = 'Plugin_Name';
$class_plugin_name_admin_php = 'class-plugin-name-admin.php';
$plugin_name_admin = 'Plugin_Name_admin';

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/  

require_once( plugin_dir_path( __FILE__ ) . "/public/$class_plugin_name_php" );

$class_plugin_name_php = 'class-plugin-name.php';
$plugin_name = 'Plugin_Name';
$class_plugin_name_admin_php = 'class-plugin-name-admin.php';
$plugin_name_admin = 'Plugin_Name_admin';

require_once( plugin_dir_path( __FILE__ ) . "/public/$class_plugin_name_php" );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 *
 */
register_activation_hook( __FILE__, array( $plugin_name, 'activate' ) );
register_deactivation_hook( __FILE__, array( $plugin_name, 'deactivate' ) );

add_action( 'plugins_loaded', array( $plugin_name, 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 *
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . "/admin/$class_plugin_name_admin_php" );
	add_action( 'plugins_loaded', array( $plugin_name_admin, 'get_instance' ) );

}
