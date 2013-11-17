<?php
/**
 * Custom post type RSS feed
 *
 * A foundation off of which to build well-documented WordPress plugins that
 * also follow WordPress Coding Standards and PHP best practices.
 *
 * @package   Custom_Post_Type_RSS_Feeds
 * @author    Jonathan Harris <jon@computingcorner.co.uk>
 * @license   GPL-2.0+
 * @link      http://www.jonathandavidharris.co.uk
 * @copyright 2013 Jonathan Harris
 *
 *
 * @wordpress-plugin
 * Plugin Name:       Custom post type RSS feed
 * Plugin URI:        TODO
 * Description:       TODO
 * Version:           1.0.0
 * Author:            TODO
 * Author URI:        TODO
 * Text Domain:       custom-post-type-rss-feeds-locale
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/<owner>/<repo>
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

/*
 * TODO:
 *
 * - replace `class-custom-post-type-rss-feeds.php` with the name of the plugin's class file
 *
 */
require_once( plugin_dir_path( __FILE__ ) . '/public/class-custom-post-type-rss-feeds.php' );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 *
 * TODO:
 *
 * - replace Custom_Post_Type_RSS_Feeds with the name of the class defined in
 *   `class-custom-post-type-rss-feeds.php`
 */
register_activation_hook( __FILE__, array( 'Custom_Post_Type_RSS_Feeds', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Custom_Post_Type_RSS_Feeds', 'deactivate' ) );

/*
 * TODO:
 *
 * - replace Custom_Post_Type_RSS_Feeds with the name of the class defined in
 *   `class-custom-post-type-rss-feeds.php`
 */
add_action( 'plugins_loaded', array( 'Custom_Post_Type_RSS_Feeds', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 * TODO:
 *
 * - replace `class-plugin-admin.php` with the name of the plugin's admin file
 * - replace Custom_Post_Type_RSS_Feeds_Admin with the name of the class defined in
 *   `class-custom-post-type-rss-feeds-admin.php`
 *
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . '/admin/class-custom-post-type-rss-feeds-admin.php' );
	add_action( 'plugins_loaded', array( 'Custom_Post_Type_RSS_Feeds_Admin', 'get_instance' ) );

}
