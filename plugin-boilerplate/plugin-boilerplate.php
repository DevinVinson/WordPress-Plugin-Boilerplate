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

/*
 * The following constant is used to define a constant for this plugin to make it
 * easier to provide cache-busting functionality on loading stylesheets
 * and JavaScript.
 *
 * After you've defined these constants, do a find/replace on the constants
 * used throughout the rest of this file.
 */
// TODO: Replace 'PLUGIN_NAME' wih the name of your class
if ( ! defined( 'PLUGIN_NAME_VERSION' ) ) {

	// TODO: Make sure that this version correspondings to the value in the 'Version' in the header
	define( 'PLUGIN_NAME_VERSION', '1.0.0' );

}

// TODO: replace `class-plugin-boilerplate.php` with the name of the actual plugin's class file
require_once( plugin_dir_path( __FILE__ ) . 'class-plugin-boilerplate.php' );

// TODO: replace PluginName with the name of the plugin defined in `class-plugin-boilerplate.php`
PluginName::get_instance();