<?php

require_once( plugin_dir_path( __FILE__ ) . '/public/classes/ProgressBar.php' );

/*
 * Autoload input classes
 */
spl_autoload_register(function($class) {
    $namespace = 'Admin\Inputs';

	if (strpos($class, $namespace) !== 0) {
		return;
	}

	$class = str_replace($namespace, '', $class);
	$class = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

	$directory = plugin_dir_path( __FILE__ );
	$path = $directory . 'admin' . DIRECTORY_SEPARATOR . 'classes' . $class;

	require_once($path);
});

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
 * Plugin Name:       SU-QLD Salesforce Campaign Progress
 * Plugin URI:        https://r6digital.com.au/
 * Description:       Provides page elements that integrate with Salesforce to provide updating progress bars.
 * Version:           1.0.0
 * Author:            R6 Digital
 * Author URI:        https://r6digital.com.au/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       suqld-campaign-progress
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SUQLD_CAMPAIGN_PROGRESS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-suqld-campaign-progress-activator.php
 */
function activate_plugin_name() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-suqld-campaign-progress-activator.php';
	Plugin_Name_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-suqld-campaign-progress-deactivator.php
 */
function deactivate_plugin_name() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-suqld-campaign-progress-deactivator.php';
	Plugin_Name_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_plugin_name' );
register_deactivation_hook( __FILE__, 'deactivate_plugin_name' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-suqld-campaign-progress.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_plugin_name() {
	$plugin = new Plugin_Name();
	$plugin->run();
}

run_plugin_name();

/*
 * Register custom post type and relevant meta boxes
 * These act as the bar interface for editing and saving Progress Bar configurations.
 */
function register_progress_bar() {
	register_post_type(
		'progress_bar',
		[
			'labels'             => [
				'name'          => __( 'Progress Bars' ),
				'singular_name' => __( 'Progress Bar' ),
			],
			'public'             => false,
			'publicly_queryable' => false,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_admin_bar'  => 5,
			'supports'           => [
				'title',
			]
		]
	);
}

/* @uses register_progress_bar() */
add_action( 'init', 'register_progress_bar' );

function register_progress_bar_meta() {
	add_meta_box(
		'bar_meta',
		__( 'Bar Settings', 'suqld-campaign-progress' ),
		'render_progress_bar_meta',
		'progress_bar'
	);
}

/* @uses register_progress_bar_meta()  */
add_action( 'add_meta_boxes', 'register_progress_bar_meta' );

/**
 * Function used for input field rendering in WP Admin interface. Directly echos output, as expected by add_meta_box().
 *
 * Utilises the global $progress_bar_metas as a data source.
 *
 * @param $post
 */
function render_progress_bar_meta( $post ) {
    $progress_bar = new ProgressBar($post->ID);

    echo $progress_bar->get_admin_html();
}

/**
 * Programmatically saves meta for Progress Bar page submission based on global $progress_bar_metas.
 *
 * @param $post_id
 */
function save_bar_meta( $post_id ) {
    $progress_bar = new ProgressBar($post_id);

    $progress_bar->save_meta();
}

/* @uses save_bar_meta()
add_action( 'save_post', 'save_bar_meta' );

/**
 * Shortcode interface to render the specified Progress Bar.
 *
 * @param array $shortcode_args WP Shortcode arguments (from shortcode usage)
 *
 * @return string HTML that will be rendered by WordPress
 */
function progress_bar_shortcode( array $shortcode_args = [] ): string {
	$args = shortcode_atts(
		[ 'id' => null ],
		$shortcode_args
	);

	/*
	 * Return early if ID provided does not correspond to a valid Progress Bar
	 */
	if ( ! isset( $args['id'] ) || get_post_type( $args['id'] ) !== "progress_bar" ) {
		return "<pre>The ID provided to this shortcode does not correspond to a valid Progress Bar post type ID.
Usage example: [progress_bar id=\"1\"]</pre>";
	}

	/*
	 * Render the Progress Bar with provided helper functions
	 */
	$progress_bar = new ProgressBar( $args['id'] );

	return $progress_bar->get_public_html();
}

add_shortcode( 'progress_bar', 'progress_bar_shortcode' );