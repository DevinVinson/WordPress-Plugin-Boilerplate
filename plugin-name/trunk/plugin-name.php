<?php

/**
 * Short Description (no period for file headers)
 *
 * Long Description.
 *
 * @package   Plugin_Name
 * @author    Your Name or Company Name <email@domain.com>
 * @license   GPL-2.0+
 * @link      http://example.com/plugin-name
 * @copyright 2014 Your Name or Company Name
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress Plugin Boilerplate
 * Plugin URI:        http://example.com/plugin-name-uri
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress dashboard.
 * Version:           1.0.0
 * Author:            Your Name or Your Company
 * Author URI:        http://example.com
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
 * The plugin activation class that runs during plugin activation.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name-activator.php';

/**
 * The plugin deactivation class that runs during plugin deactivation.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name-deactivator.php';

/** This action is documented in includes/class-plugin-name-activator.php */
register_activation_hook( __FILE__, array( 'Plugin_Name_Activator', 'activate' ) );

/** This action is documented in includes/class-plugin-name-deactivator.php */
register_activation_hook( __FILE__, array( 'Plugin_Name_Deactivator', 'deactivate' ) );

/**
 * The class responsible for orchestrating the actions and filters of the
 * core plugin.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name-loader.php';

/**
 * The class responsible for defining internationalization functionality
 * of the plugin.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name-i18n.php';

/**
 * The base class used to define certain functionality and attributes used among
 * the dashboard-specific and public-facing functionality.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name.php';

/**
 * The class responsible for defining all actions that occur in the Dashboard.
 */
require_once plugin_dir_path( __FILE__ ) . 'admin/class-plugin-name-admin.php';

/**
 * The class responsible for defining all actions that occur in the public-facing
 * side of the site.
 */
require_once plugin_dir_path( __FILE__ ) . 'public/class-plugin-name-public.php';

$loader = new Plugin_Name_Loader();
$plugin = new Plugin_Name( $loader );

$plugin_i18n = new Plugin_Name_i18n();
$plugin_i18n->set_domain( $plugin->get_slug() );
$loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

$plugin_admin = new Plugin_Name_Admin( $plugin->get_version() );
$loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
$loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

$plugin_public = new Plugin_Name_Public( $plugin->get_version() );
$loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
$loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

$plugin->run();
