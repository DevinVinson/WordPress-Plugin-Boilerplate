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
 * Domain Path:       /languages
 */

namespace PluginName;

// check whether the WordPress environment loaded or not
if (!defined('ABSPATH')) {
    exit('WordPress is not loaded.');
}

// If this file is called directly, abort.
if (! defined('WPINC')) {
    exit('No WordPress includes.');
}

// checking Composer autoloader
if (!is_readable(__DIR__ . '/vendor/autoload.php')) {
    exit('No readable composer autoloader dependency.');
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('PLUGIN_NAME_VERSION', '1.0.0');

use PluginName\Includes\PluginNameActivator;
use PluginName\Includes\PluginNameDeactivator;
use PluginName\Includes\PluginNameEngine;

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_plugin_name()
{
    PluginNameActivator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_plugin_name()
{
    PluginNameDeactivator::deactivate();
}

register_activation_hook(__FILE__, 'PluginName\activate_plugin_name');
register_deactivation_hook(__FILE__, 'PluginName\deactivate_plugin_name');

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_plugin_name()
{
    $plugin = new PluginNameEngine;
    $plugin->run();
}
run_plugin_name();
