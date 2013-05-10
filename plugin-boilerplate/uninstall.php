<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package	PluginName
 * @since	1.0.0
 */

// If uninstall, not called from WordPress exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

// TODO:	Define uninstall functionality here