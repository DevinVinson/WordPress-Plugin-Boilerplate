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
 * @version 1.0.0
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

/**
 * If this file is attempted to be accessed directly, we'll exit.
 *
 * The following check provides a level of security from other files
 * that request data directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once( plugin_dir_path( __FILE__ ) . 'class-plugin-boilerplate.php' );

// TODO: make sure to replace PluginName with the name of the plugin defined in `class-plugin-boilerplate.php`
PluginName::get_instance();