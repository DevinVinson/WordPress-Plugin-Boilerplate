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
 * @package           Test_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Test Plugin
 * Plugin URI:        http://example.com/test-plugin-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Orpheus, Inc.
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

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'TEST_PLUGIN_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-test-plugin-activator.php
 */
function activate_test_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-test-plugin-activator.php';
	Test_Plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-test-plugin-deactivator.php
 */
function deactivate_test_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-test-plugin-deactivator.php';
	Test_Plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_test_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_test_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-test-plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_test_plugin() {

	$plugin = new Test_Plugin();
	$plugin->run();

}
run_test_plugin();
