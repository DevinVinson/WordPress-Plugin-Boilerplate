<?php
/**
 * Installation related functions and actions.
 *
 * @package  Plugin_Name
 * @version  1.0.0
 */

namespace Plugin_Name;

if ( ! class_exists( 'Plugin' ) ) :

	/**
	 * Main Plugin Class. This will be the singleton instance
	 */
	final class Plugin {

		/**
		 * Plugin version.
		 *
		 * @var string
		 */
		public $version = '1.0.0';

		/**
		 * The single instance of the class.
		 *
		 * @var Plugin
		 * @since 1.0.0
		 */
		protected static $instance = null;

		/**
		 * If the class was initialized already.
		 *
		 * @var bool
		 * @since 1.0.0
		 */
		protected static $initialized = false;

		/**
		 * Main Plugin Instance.
		 *
		 * Ensures only one instance of Plugin is loaded or can be loaded.
		 *
		 * @since 1.0.0
		 * @static
		 * @see PNameSingleton()
		 * @return Plugin - Main instance.
		 */
		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
				self::$instance->initalize_plugin();
			}
			return self::$instance;
		}

		/**
		 * Cloning is forbidden.
		 *
		 * @since 1.0.0
		 */
		public function __clone() {
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'plugin-name' ), '1.0.0' );
		}

		/**
		 * Unserializing instances of this class is forbidden.
		 *
		 * @since 1.0.0
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'plugin-name' ), '1.0.0' );
		}

		/**
		 * Initializer.
		 */
		public function initalize_plugin() {
			if ( self::$initialized ) {
				_doing_it_wrong( __FUNCTION__, esc_html__( 'Only a single instance of this class is allowed. Use singleton.', 'plugin-name' ), '1.0.0' );
				return;
			}

			self::$initialized = true;

			$this->define_constants();
			$this->includes();
			$this->init_hooks();

			do_action( 'plugin_name_loaded' );
		}

		/**
		 * Define Constants.
		 */
		private function define_constants() {
			$upload_dir = wp_upload_dir();

			$this->define( 'PNAME_PLUGIN_BASENAME', plugin_basename( PNAME_PLUGIN_FILE ) );
			$this->define( 'PNAME_VERSION', $this->version );
		}

		/**
		 * Define constant if not already set.
		 *
		 * @param  string $name Variable to define.
		 * @param  mixed  $value Value to define the variable with.
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
				case 'admin':
					return is_admin();
				case 'ajax':
					return defined( 'DOING_AJAX' );
				case 'cron':
					return defined( 'DOING_CRON' );
				case 'frontend':
					return ( ! is_admin() || defined( 'DOING_AJAX' ) ) && ! defined( 'DOING_CRON' );
			}
			return false;
		}

		/**
		 * Include required core files used in admin and on the frontend.
		 */
		private function includes() {
			require_once 'includes/class-autoloader.php';
			new Autoloader();
			require_once 'includes/plugin-name-core-functions.php';
			register_activation_hook( PNAME_PLUGIN_FILE, array( 'Plugin_Name\Install', 'install' ) );

			if ( $this->is_request( 'admin' ) ) {
				new Admin\Main();
			}

			if ( $this->is_request( 'frontend' ) ) {
				new Frontend_Assets(); // Frontend Scripts.
			}

			$this->load_customizations();
		}

		/**
		 * Include required customizations files.
		 */
		private function load_customizations() {
			Customizations\ACF::init();
		}

		/**
		 * Hook into actions and filters.
		 *
		 * @since  1.0.0
		 */
		private function init_hooks() {
			add_action( 'init', array( $this, 'init' ), 0 );
		}

		/**
		 * Init Plugin when WordPress Initialises.
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
		private function load_plugin_textdomain() {
			$locale = apply_filters( 'plugin_locale', get_locale(), 'plugin-name' );

			load_textdomain( 'plugin-name', WP_LANG_DIR . '/plugin-name/plugin-name-' . $locale . '.mo' );
			load_plugin_textdomain( 'plugin-name', false, plugin_basename( dirname( __FILE__ ) ) . '/i18n/languages' );
		}

		/**
		 * Get the plugin url.
		 *
		 * @return string
		 */
		public function plugin_url() {
			return untrailingslashit( plugins_url( '/', __FILE__ ) );
		}

		/**
		 * Get the plugin path.
		 *
		 * @return string
		 */
		public function plugin_path() {
			return untrailingslashit( plugin_dir_path( __FILE__ ) );
		}

		/**
		 * Get the template path.
		 *
		 * @return string
		 */
		public function template_path() {
			return apply_filters( 'plugin_name_template_path', 'plugin-name/' );
		}

		/**
		 * Get Ajax URL.
		 *
		 * @return string
		 */
		public function ajax_url() {
			return admin_url( 'admin-ajax.php', 'relative' );
		}
	}

endif;
