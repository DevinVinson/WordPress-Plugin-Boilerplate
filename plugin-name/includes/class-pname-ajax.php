<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Plugin_Name PName_AJAX.
 *
 * AJAX Event Handler.
 *
 * @class    PName_AJAX
 * @version  1.0.0
 * @package  Plugin_Name/Classes
 * @category Class
 * @author   Your Name or Your Company
 */
class PName_AJAX {

	/**
	 * Hook in ajax handlers.
	 */
	public static function init() {
		self::add_ajax_events();
	}

	/**
	 * Hook in methods - uses WordPress ajax handlers (admin-ajax).
	 */
	public static function add_ajax_events() {
		// plugin_name_EVENT => nopriv
		$ajax_events = array(
			'sample_event' => true,
		);

		foreach ( $ajax_events as $ajax_event => $nopriv ) {
			add_action( 'wp_ajax_plugin_name_' . $ajax_event, array( __CLASS__, $ajax_event ) );

			if ( $nopriv ) {
				add_action( 'wp_ajax_nopriv_plugin_name_' . $ajax_event, array( __CLASS__, $ajax_event ) );
			}
		}
	}

	/**
	 * This is a sample AJAX event callback.
	 */
	public static function sample_event() {
		wp_send_json( $data );
	}
}

PName_AJAX::init();
