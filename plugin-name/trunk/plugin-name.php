<?php

/**
 * Short Description (no period for file headers)
 *
 * Long Description.
 *
 * @package   Plugin_Name
 * @author    Your Name or Company Name <email@domain.com>
 * @license   GPL-2.0+
 * @link      http://exmaple.com/plugin-name
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
 * Includes the plugin activation class that runs during plugin activation.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name-activator.php';

/**
 * Includes the plugin deactivation class that runs during plugin deactivation.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name-deactivator.php';

/**
 * The base class used to define certain functionality and attributes shared among
 * all shared subclasses of the core plugin file.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name.php';

/** This action is documented in includes/class-plugin-name-activator.php */
register_activation_hook( __FILE__, array( 'Plugin_Name_Activator', 'activate' ) );

/** This action is documented in includes/class-plugin-name-deactivator.php */
register_activation_hook( __FILE__, array( 'Plugin_Name_Deactivator', 'deactivate' ) );

/**
 * Includes the class responsible for defining the core functionality of the
 * shared components of the plugin.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name-loader.php';
$loader = new Plugin_Name_Loader();

/**
 * Includes the class responsible for defining internationalization functionality
 * of the plugin.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name-i18n.php';
$plugin_i18n = new Plugin_Name_i18n();
$loader->add( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

/**
 * TODO
 */
require_once plugin_dir_path( __FILE__ ) . 'admin/class-plugin-name-admin.php';
$plugin_name_admin = new Plugin_Name_Admin();
$loader->add( 'admin_enqueue_scripts', $plugin_name_admin, 'enqueue_styles' );
$loader->add( 'admin_enqueue_scripts', $plugin_name_admin, 'enqueue_scripts' );

/**
 * TODO
 */
require_once plugin_dir_path( __FILE__ ) . 'public/class-plugin-name-public.php';
$plugin_name_public = new Plugin_Name_Public();
$loader->add( 'wp_enqueue_scripts', $plugin_name_public, 'enqueue_styles' );
$loader->add( 'wp_enqueue_scripts', $plugin_name_public, 'enqueue_scripts' );

/**
 * TODO
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name.php';
$plugin = new Plugin_Name( $loader );

$plugin->run();