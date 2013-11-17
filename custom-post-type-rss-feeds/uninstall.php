<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package   Custom_Post_Type_RSS_Feeds
 * @author    Jonathan Harris <jon@computingcorner.co.uk>
 * @license   GPL-2.0+
 * @link      http://www.jonathandavidharris.co.uk
 * @copyright 2013 Jonathan Harris
 */
 
// If uninstall not called from WordPress, then exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// TODO: Define uninstall functionality here