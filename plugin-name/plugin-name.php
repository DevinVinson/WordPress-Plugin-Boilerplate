<?php

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
 * Plugin Name:       WordPress Plugin Boilerplate
 * Plugin URI:        http://example.com/plugin-name-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Your Name or Your Company
 * Author URI:        http://example.com/?
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-name
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'Plugin_Name' ) ) :

	final class Plugin_Name {

		/**
		 * Plugin_Name version.
		 *
		 * @var string
		 */
		public $version = '1.0.0';

		/**
		 * The single instance of the class.
		 *
		 * @var Plugin_Name
		 * @since 1.0.0
		 */
		protected static $_instance = null;

		/**
		 * Main Plugin_Name Instance.
		 *
		 * Ensures only one instance of Plugin_Name is loaded or can be loaded.
		 *
		 * @since 1.0.0
		 * @static
		 * @see PNameSingleton()
		 * @return Plugin_Name - Main instance.
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		/**
		 * Cloning is forbidden.
		 * @since 1.0.0
		 */
		public function __clone() {
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'plugin-name' ), '1.0.0' );
		}

		/**
		 * Unserializing instances of this class is forbidden.
		 * @since 1.0.0
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'plugin-name' ), '1.0.0' );
		}

		/**
		 * Plugin_Name Constructor.
		 */
		public function __construct() {
			$this->define_constants();
			$this->includes();
			$this->init_hooks();

			do_action( 'plugin_name_loaded' );
		}

		/**
		 * Hook into actions and filters.
		 * @since  1.0.0
		 */
		private function init_hooks() {
			register_activation_hook( __FILE__, array( 'PName_Install', 'install' ) );
			add_action( 'init', array( $this, 'init' ), 0 );
		}

		/**
		 * Define PName Constants.
		 */
		private function define_constants() {
			$upload_dir = wp_upload_dir();

			$this->define( 'PNAME_PLUGIN_FILE', __FILE__ );
			$this->define( 'PNAME_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
			$this->define( 'PNAME_VERSION', $this->version );
		}

		/**
		 * Define constant if not already set.
		 *
		 * @param  string $name
		 * @param  string|bool $value
		 */
		private function define( $name, $value ) {
			if ( ! defined( $name ) ) {
				define( $name, $value );
			}
		}

		/**
		 * What type of request is this?
		 *
		 * @param  string $type admin, ajax, cron or frontend.
		 * @return bool
		 */
		private function is_request( $type ) {
			switch ( $type ) {
				case 'admin' :
					return is_admin();
				case 'ajax' :
					return defined( 'DOING_AJAX' );
				case 'cron' :
					return defined( 'DOING_CRON' );
				case 'frontend' :
					return ( ! is_admin() || defined( 'DOING_AJAX' ) ) && ! defined( 'DOING_CRON' );
			}
		}

		/**
		 * Include required core files used in admin and on the frontend.
		 */
		public function includes() {
			include_once( 'includes/class-plugin-name-autoloader.php' );
			include_once( 'includes/plugin-name-core-functions.php' );
			include_once( 'includes/class-plugin-name-install.php' );
			include_once( 'includes/class-plugin-name-ajax.php' );

			if ( $this->is_request( 'admin' ) ) {
				include_once( 'includes/admin/class-plugin-name-admin.php' );
			}

			if ( $this->is_request( 'frontend' ) ) {
				$this->frontend_includes();
			}

			$this->customizations_includes();
		}

		/**
		 * Include required frontend files.
		 */
		public function frontend_includes() {
			include_once( 'includes/class-plugin-name-frontend-assets.php' ); // Frontend Scripts
		}

		/**
		 * Include required customizations files.
		 */
		public function customizations_includes() {
			$customizations = array(
				'acf',
			);

			foreach ( $customizations as $customization ) {
				include_once( 'includes/customizations/class-plugin-name-' . $customization . '-hooks.php' );
			}
		}

		/**
		 * Init Plugin_Name when WordPress Initialises.
		 */
		public function init() {
			// Before init action.
			do_action( 'before_plugin_name_init' );

			// Set up localisation.
			$this->load_plugin_textdomain();

			// Init action.
			do_action( 'plugin_name_init' );
		}

		/**
		 * Load Localisation files.
		 *
		 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
		 *
		 * Locales found in:
		 *      - WP_LANG_DIR/plugin-name/plugin-name-LOCALE.mo
		 *      - WP_LANG_DIR/plugins/plugin-name-LOCALE.mo
		 */
		public function load_plugin_textdomain() {
			$locale = apply_filters( 'plugin_locale', get_locale(), 'plugin-name' );

			load_textdomain( 'plugin-name', WP_LANG_DIR . '/plugin-name/plugin-name-' . $locale . '.mo' );
			load_plugin_textdomain( 'plugin-name', false, plugin_basename( dirname( __FILE__ ) ) . '/i18n/languages' );
		}

		/**
		 * Get the plugin url.
		 * @return string
		 */
		public function plugin_url() {
			return untrailingslashit( plugins_url( '/', __FILE__ ) );
		}

		/**
		 * Get the plugin path.
		 * @return string
		 */
		public function plugin_path() {
			return untrailingslashit( plugin_dir_path( __FILE__ ) );
		}

		/**
		 * Get the template path.
		 * @return string
		 */
		public function template_path() {
			return apply_filters( 'plugin_name_template_path', 'plugin-name/' );
		}

		/**
		 * Get Ajax URL.
		 * @return string
		 */
		public function ajax_url() {
			return admin_url( 'admin-ajax.php', 'relative' );
		}
	}

endif;

/**
 * Main instance of Plugin_Name.
 *
 * Returns the main instance of PName to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return Plugin_Name
 */
function PNameSingleton() {
	return Plugin_Name::instance();
}

// Global for backwards compatibility.
$GLOBALS['plugin_name'] = PNameSingleton();
