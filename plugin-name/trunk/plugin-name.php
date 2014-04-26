<?php
/**
 * Short Description (no period for file headers)
 *
 * Long Description.
 *
 * @link URL
 * @since x.x.x (if available)
 *
 * @package WordPress
 * @subpackage Component
 *
 * @wordpress-plugin
 * Plugin Name:       TODO
 * Plugin URI:        TODO
 * Description:       TODO
 * Version:           TODO
 * Author:            TODO
 * Author URI:        TODO
 * Text Domain:       plugin-name-locale
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Includes the plugin activation class that runs during plugin activation.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name-activator.php';

/**
 * Includes the plugin deactivation class that runs during plugin deactivation.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name-deactivator.php';

/** This action is documented in includes/class-plugin-name-activator.php */
register_activation_hook( __FILE__, array( 'Plugin_Name_Activator', 'activate' ) );

/** This action is documented in includes/class-plugin-name-deactivator.php */
register_activation_hook( __FILE__, array( 'Plugin_Name_Deactivator', 'deactivate' ) );
