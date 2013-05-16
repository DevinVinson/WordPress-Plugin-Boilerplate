<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package  PluginName
 * @author   Your Name <email@example.com>
 * @license  GPL-2.0+
 * @link     example.com
 * @copyright 2013 Your Name or Company Name
 * @version  1.0.0
 */

// If uninstall, not called from WordPress, then exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// TODO: Define uninstall functionality here