<?php
/**
 * Handle frontend scripts
 *
 * @class       PName_Frontend_Scripts
 * @version     1.0.0
 * @package     Plugin_Name/Classes/
 * @category    Class
 * @author      Your Name or Your Company
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once PNameSingleton()->plugin_path() . '/includes/class-pname-assets.php';

/**
 * PName_Frontend_Scripts Class.
 */
class PName_Frontend_Assets extends PName_Assets {

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
	 * @access private
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
	 * @access private
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

new PName_Frontend_Assets();
