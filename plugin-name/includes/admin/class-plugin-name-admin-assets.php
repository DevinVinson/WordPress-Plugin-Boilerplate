<?php
/**
 * Load assets
 *
 * @author      Your Name or Your Company
 * @category    Admin
 * @package     PName/Admin
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'PName_Admin_Assets' ) ) :

	/**
 * PName_Admin_Assets Class.
 */
	class PName_Admin_Assets {

		/**
	 * Hook in tabs.
	 */
		public function __construct() {
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_styles' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
		}

		/**
	 * Enqueue styles.
	 */
		public function admin_styles() {
			global $wp_scripts;

			$screen         = get_current_screen();
			$screen_id      = $screen ? $screen->id : '';

			// Register admin styles
			wp_register_style( 'plugin_name_admin_styles', PNameSingleton()->plugin_url() . '/assets/css/admin.css', array(), PNAME_VERSION );
		}


		/**
	 * Enqueue scripts.
	 */
		public function admin_scripts() {
			global $wp_query, $post;

			$screen       = get_current_screen();
			$screen_id    = $screen ? $screen->id : '';
			$plugin_name_screen_id = sanitize_title( __( 'Plugin_Name', 'plugin-name' ) );
			$suffix       = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

			// Register scripts
			wp_register_script( 'plugin_name_admin', PNameSingleton()->plugin_url() . '/assets/js/admin/plugin_name_admin' . $suffix . '.js', array( 'jquery' ), PNAME_VERSION );
		}
	}

endif;

return new PName_Admin_Assets();
