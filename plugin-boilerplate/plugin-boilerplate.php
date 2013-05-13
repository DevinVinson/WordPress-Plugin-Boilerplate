<?php
/**
 * The WordPress Plugin Boilerplate.
 *
 * A foundation off of which to build well-documented WordPress plugins that also follow
 * WordPress coding standards and PHP best practices.
 *
 * @package PluginName
 * @author  Your Name <email@example.com>
 * @license GPL-2.0+
 * @link    TODO
 *
 * @wordpress-plugin
 * Plugin Name: TODO
 * Plugin URI: TODO
 * Description: TODO
 * Version: 1.0.0
 * Author: TODO
 * Author URI: TODO
 * Author Email: TODO
 * Text Domain: plugin-name-locale
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /lang/
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// TODO: replace `class-plugin-boilerplate.php` with the name of the actual plugin's class file
require_once( plugin_dir_path( __FILE__ ) . 'class-plugin-boilerplate.php' );

// Register hooks that are fired when the plugin is activated, deactivated, and uninstalled, respectively.
// TODO: replace PluginName with the name of the plugin defined in `class-plugin-boilerplate.php`
register_activation_hook( __FILE__, array( 'PluginName', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'PluginName', 'deactivate' ) );

// TODO: replace PluginName with the name of the plugin defined in `class-plugin-boilerplate.php`
PluginName::get_instance();