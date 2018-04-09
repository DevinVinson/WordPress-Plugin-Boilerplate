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
 * Domain Path:       /i18n/languages
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

require_once 'class-plugin-name.php';

/**
 * Main instance of Plugin_Name.
 *
 * Returns the main instance of PName to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return Plugin_Name
 */

// phpcs:ignore WordPress.NamingConventions.ValidFunctionName
function PNameSingleton() {
	return Plugin_Name::instance();
}

// Global for backwards compatibility.
$GLOBALS['plugin_name'] = PNameSingleton();
