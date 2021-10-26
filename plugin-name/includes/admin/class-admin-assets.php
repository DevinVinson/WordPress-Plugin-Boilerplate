<?php
/**
 * Load assets
 *
 * @package     Plugin_Name/Admin
 * @version     1.0.0
 */

namespace Plugin_Name\Admin;

use Plugin_Name\Assets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Admin_Assets Class.
 */
class Admin_Assets extends Assets {

	/**
	 * Hook in methods.
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'load_scripts' ) );
		add_action( 'admin_print_scripts', array( $this, 'localize_printed_scripts' ), 5 );
		add_action( 'admin_print_footer_scripts', array( $this, 'localize_printed_scripts' ), 5 );
	}

	/**
	 * Get styles for the frontend.
	 *
	 * @return array
	 */
	public function get_styles() {
		return apply_filters(
			'plugin_name_enqueue_admin_styles',
			array(
				'plugin-name-admin' => array(
					'src' => $this->localize_asset( 'css/admin/plugin-name-admin.css' ),
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
			'plugin_name_enqueue_admin_scripts',
			array(
				'plugin-name-admin' => array(
					'src'  => $this->localize_asset( 'js/admin/plugin-name-admin.js' ),
					'data' => array(
						'ajax_url' => PNameSingleton()->ajax_url(),
					),
				),
			)
		);
	}

}
