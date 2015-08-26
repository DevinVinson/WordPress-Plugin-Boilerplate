<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://pandammonium.org/dev/wp-blipper/
 * @since             0.0.1
 * @package           WP_Blipper
 *
 * @wordpress-plugin
 * Plugin Name:       WP Blipper
 * Plugin URI:        http://pandammonium.org/dev/wp-blipper/
 * Description:       Displays the latest entry on Polaroid|Blipfoto by a given user in a widget.
 * Version:           0.0.1
 * Author:            Caity Ross
 * Author URI:        http://pandammonium.org/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-blipper
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-blipper-activator.php
 */
function activate_wp_blipper() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-blipper-activator.php';
	wp_blipper_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-blipper-deactivator.php
 */
function deactivate_wp_blipper() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-blipper-deactivator.php';
	wp_blipper_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_blipper' );
register_deactivation_hook( __FILE__, 'deactivate_wp_blipper' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-blipper.php';


/**
 * The plugin widget, where the latest blip will be shown
 */
function register_wp_blipper_widget() {
  require_once plugin_dir_path( __FILE__ ) . 'public/class-wp-blipper-widget.php';
  register_widget( 'WP_Blipper_Widget' );
}
add_action( 'widgets_init', 'register_wp_blipper_widget' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_blipper() {

	$plugin = new wp_blipper();
	$plugin->run();

}
run_wp_blipper();
