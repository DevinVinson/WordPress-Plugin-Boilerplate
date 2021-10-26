<?php
/**
 * Handle frontend scripts
 *
 * @class       PName_Frontend_Scripts
 * @version     1.0.0
 * @package     Plugin_Name/Classes/
 */

namespace Plugin_Name;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Frontend_Assets Class.
 */
class Frontend_Assets extends Assets {

	/**
	 * Hook in methods.
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'load_scripts' ) );
		add_action( 'wp_print_scripts', array( $this, 'localize_printed_scripts' ), 5 );
		add_action( 'wp_print_footer_scripts', array( $this, 'localize_printed_scripts' ), 5 );
	}

	/**
	 * Get styles for the frontend.
	 *
	 * @return array
	 */
	public function get_styles() {
		return apply_filters(
			'plugin_name_enqueue_styles',
			array(
				'plugin-name-general' => array(
					'src' => $this->localize_asset( 'css/frontend/plugin-name.css' ),
				),
			)
		);
	}

	/**
	 * Get styles for the frontend.
	 *
	 * @return array
	 */
	public function get_scripts() {
		return apply_filters(
			'plugin_name_enqueue_scripts',
			array(
				'plugin-name-general' => array(
					'src'  => $this->localize_asset( 'js/frontend/plugin-name.js' ),
					'data' => array(
						'ajax_url' => PNameSingleton()->ajax_url(),
					),
				),
			)
		);
	}

}

new Frontend_Assets();
