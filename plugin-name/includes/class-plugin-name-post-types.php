<?php
/**
 * Post Types
 *
 * Registers post types and taxonomies.
 *
 * @class     PName_Post_types
 * @version   1.0.0
 * @package   Plugin_Name/Classes/Post Types
 * @category  Class
 * @author    Your Name or Your Company
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * PName_Post_types Class.
 */
class PName_Post_types {

	/**
	 * Hook in methods.
	 */
	public static function init() {
		// add_action( 'init', array( __CLASS__, 'register_taxonomies' ), 5 );
		// add_action( 'init', array( __CLASS__, 'register_post_types' ), 5 );
	}

	/**
	 * Register core taxonomies.
	 */
	public static function register_taxonomies() {
		if ( taxonomy_exists( 'taxonomy_name' ) ) {
			return;
		}

		do_action( 'plugin_name_register_taxonomy' );

		// REGISTER A TAXONOMY HERE

		do_action( 'plugin_name_after_register_taxonomy' );
	}

	/**
	 * Register core post types.
	 */
	public static function register_post_types() {
		if ( post_type_exists( 'post_type_name' ) ) {
			return;
		}

		do_action( 'plugin_name_register_post_type' );

		// REGISTER A POST TYPE HERE

		do_action( 'plugin_name_after_register_post_type' );
	}
}

PName_Post_types::init();
