<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * When populating this file, consider the following flow
 * of control:
 *
 * - Here, onActivateNewSite() should break. I forgot that the method must be static... facepalm.
 * - Check if the $_REQUEST content actually is the plugin name.
 * - Check if it goes through the authentication (admin referrer checks).
 * - Check the output of $_GET and if it makes sense.
 * - Repeat with other user roles. Best directly by using the links/query string params.
 * - Repeat stuff for multisite. Once for a single site in the network, once sitewide.
 *
 * For more information, see the following discussion:
 * https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate/pull/123#issuecomment-28541913
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}
