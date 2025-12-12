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
 * @package           Oxygen_Form_Builder
 *
 * @wordpress-plugin
 * Plugin Name:       Oxygen Form Builder
 * Plugin URI:        http://example.com/oxygen-form-builder-uri/
 * Description:       A custom component plugin for Oxygen Builder that adds form building elements.
 * Version:           1.0.0
 * Author:            Your Name
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       oxygen-form-builder
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
define( 'OXYGEN_FORM_BUILDER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-oxygen-form-builder-activator.php
 */
function activate_oxygen_form_builder() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-oxygen-form-builder-activator.php';
	Oxygen_Form_Builder_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-oxygen-form-builder-deactivator.php
 */
function deactivate_oxygen_form_builder() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-oxygen-form-builder-deactivator.php';
	Oxygen_Form_Builder_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_oxygen_form_builder' );
register_deactivation_hook( __FILE__, 'deactivate_oxygen_form_builder' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-oxygen-form-builder.php';

/**
 * The Oxygen Builder integration file.
 */
function init_oxygen_form_builder_integration() {
    require plugin_dir_path( __FILE__ ) . 'includes/oxygen/oxygen-integration.php';
}
add_action( 'plugins_loaded', 'init_oxygen_form_builder_integration' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_oxygen_form_builder() {

	$plugin = new Oxygen_Form_Builder();
	$plugin->run();

}
run_oxygen_form_builder();
