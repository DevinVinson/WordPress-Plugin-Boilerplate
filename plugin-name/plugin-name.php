<?php
/**
 * The WordPress Plugin Boilerplate.
 *
 * A foundation off of which to build well-documented WordPress plugins that also follow
 * WordPress coding standards and PHP best practices.
 *
 * @package   Plugin_Name
 * @author    Your Name <email@example.com>
 * @license   GPL-2.0+
 * @link      http://example.com
 * @copyright 2013 Your Name or Company Name
 *
 * @wordpress-plugin
 * Plugin Name: TODO
 * Plugin URI:  TODO
 * Description: TODO
 * Version:     1.0.0
 * Author:      TODO
 * Author URI:  TODO
 * Text Domain: plugin-name-locale
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// TODO: replace `class-plugin-name.php` with the name of the actual plugin's class file
require_once( plugin_dir_path( __FILE__ ) . 'class-plugin-name.php' );
// TODO: replace `class-plugin-admin.php` with the name of the actual plugin's admin class file
if( is_admin() ) {
	require_once( plugin_dir_path( __FILE__ ) . 'class-plugin-name-admin.php' );
}

// Register hooks that are fired when the plugin is activated or deactivated.
// When the plugin is deleted, the uninstall.php file is loaded.
// TODO: replace Plugin_Name with the name of the class defined in `class-plugin-name.php`
register_activation_hook( __FILE__, array( 'Plugin_Name', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Plugin_Name', 'deactivate' ) );

// TODO: replace Plugin_Name with the name of the class defined in `class-plugin-name.php`
add_action( 'plugins_loaded', array( 'Plugin_Name', 'get_instance' ) );
// TODO: replace Plugin_Name_Admin with the name of the class defined in `class-plugin-name-admin.php`
if( is_admin() ) {
	//add_action( 'plugins_loaded', array( 'Plugin_Name_Admin', 'get_instance' ) );
}