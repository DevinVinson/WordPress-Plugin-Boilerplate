<?php
/**
 * Plugin Name: My Custom Plugin
 * Plugin URI:  https://example.com
 * Description: A simple WordPress plugin that displays a custom admin notice.
 * Version:     1.0.0
 * Author:      Your Name
 * Author URI:  https://example.com
 * License:     GPL-2.0+
 * Text Domain: my-custom-plugin
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Define plugin constants
define( 'MY_CUSTOM_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'MY_CUSTOM_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Include the main class file
require_once MY_CUSTOM_PLUGIN_PATH . 'includes/class-my-custom-plugin.php';

// Run the plugin
function run_my_custom_plugin() {
    $plugin = new My_Custom_Plugin();
    $plugin->run();
}
add_action( 'plugins_loaded', 'run_my_custom_plugin' );
