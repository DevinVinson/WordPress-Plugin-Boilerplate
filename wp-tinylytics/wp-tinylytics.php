<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://jimmitchellmedia.net
 * @since             0.0.1
 * @package           WP_Tinylytics
 *
 * @wordpress-plugin
 * Plugin Name:       WP Tinylytics
 * Plugin URI:        https://jimmitchellmedia.net/tinylytics-for-wordpress/
 * Description:       Enables the various features available on the Tinylytics platform.
 * Version:           0.0.1
 * Author:            Jim Mitchell
 * Author URI:        https://jimmitchellmedia.net/
 * License:           GPL-2.0+
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-tinylytics
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 0.0.1 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WP_TINYLYTICS_VERSION', '0.0.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-tinylytics-activator.php
 */
function activate_wp_tinylytics() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-tinylytics-activator.php';
	WP_Tinylytics_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-tinylytics-deactivator.php
 */
function deactivate_wp_tinylytics() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-tinylytics-deactivator.php';
	WP_Tinylytics_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_tinylytics' );
register_deactivation_hook( __FILE__, 'deactivate_wp_tinylytics' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-tinylytics.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.0.1
 */
function run_wp_tinylytics() {

	$plugin = new WP_Tinylytics();
	$plugin->run();

}
run_wp_tinylytics();
