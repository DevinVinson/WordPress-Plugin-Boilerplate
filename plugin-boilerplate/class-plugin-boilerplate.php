<?php
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The WordPress Plugin Boilerplate.
 *
 * A foundation off of which to build well-documented WordPress plugins that also follow
 * WordPress coding standards and PHP best practices.
 *
 * Use PHPDoc tags if you wish to be able to document the code using a documentation
 * generator.
 *
 * @package PluginName
 * @author  Your Name <email@example.com>
 * @license GPL-2.0+
 * @link    TODO
 * @version 1.0.0
 */
class PluginName {

	/**
	* Refers to a single instance of this class.
	*
	* @var    object
	*/
	protected static $instance = null;

	/**
	* Refers to the slug of the plugin screen.
	*
	* @var    string
	*/
	protected $plugin_screen_slug = null;

	/**
	* Creates or returns an instance of this class.
	*
	* @since     1.0.0
	* @return    PluginName    A single instance of this class.
	*/
	public function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;

	}

	/**
	* Initializes the plugin by setting localization, filters, and administration functions.
	*
	* @since    1.0.0
	*/
	private function __construct() {

		// Load plugin text domain
		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );

		/*
		 * Add the options page and menu item.
		 * Uncomment the following line to enable the Settings Page for the plugin:
		 */
		//add_action( 'admin_menu', array( $this, 'add_plugin_admin_menu' ) );

		/*
		 * Register admin styles and scripts
		 * If the Settings page has been activated using the above hook, the scripts and styles
		 * will only be loaded on the settings page. If not, they will be loaded for all
		 * admin pages.
		 *
		 * add_action( 'admin_enqueue_scripts', array( $this, 'register_admin_styles' ) );
		 * add_action( 'admin_enqueue_scripts', array( $this, 'register_admin_scripts' ) );
		 */

		// Register site stylesheets and JavaScript
		add_action( 'wp_enqueue_scripts', array( $this, 'register_plugin_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'register_plugin_scripts' ) );

		/*
		 * TODO:
		 *
		 * Define the custom functionality for your plugin. The first parameter of the
		 * add_action/add_filter calls are the hooks into which your code should fire.
		 *
		 * The second parameter is the function name located within this class. See the stubs
		 * later in the file.
		 *
		 * For more information:
		 * http://codex.wordpress.org/Plugin_API#Hooks.2C_Actions_and_Filters
		 */
		add_action( 'TODO', array( $this, 'action_method_name' ) );
		add_filter(' TODO', array( $this, 'filter_method_name' ) );

	}

	/**
	 * Fired when the plugin is activated.
	 *
	 * @param    boolean    $network_wide    True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog
	 */
	 public static function activate( $network_wide ) {
		// TODO: Define activation functionality here
	}

	/**
	 * Fired when the plugin is deactivated.
	 *
	 * @param    boolean    $network_wide    True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog
	 * @since    1.0.0
	 */
	 public static function deactivate( $network_wide ) {
		// TODO: Define deactivation functionality here
	}

	/**
	 * Loads the plugin text domain for translation
	 */
	public function load_plugin_textdomain() {

		// TODO: replace "plugin-name-locale" with a unique value for your plugin
		$domain = 'plugin-name-locale';
		$locale = apply_filters( 'plugin_locale', get_locale(), $domain );

		load_textdomain( $domain, WP_LANG_DIR . '/' . $domain . '/' . $domain . '-' . $locale . '.mo' );
		load_plugin_textdomain( $domain, FALSE, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );

	}

	/**
	 * Registers and enqueues admin-specific styles.
	 *
	 * @since    1.0.0
	 */
	public function register_admin_styles() {

		/*
		 * Check if the plugin has registered a settings page
		 * and if it has, make sure only to enqueue the scripts on the relevant screens
		 */

		if ( isset( $this->plugin_screen_slug ) ) {

			/*
			 * Check if current screen is the admin page for this plugin
			 * Don't enqueue stylesheet or JavaScript if it's not
			 */

			$screen = get_current_screen();
			if ( $screen->id == $this->plugin_screen_slug ) {
				wp_enqueue_style( 'plugin-name-admin-styles', plugins_url( 'css/admin.css', __FILE__ ), PLUGIN_NAME_VERSION );
			}

		}

	}

	/**
	 * Registers and enqueues admin-specific JavaScript.
	 *
	 * @since    1.0.0
	 */
	public function register_admin_scripts() {

		/*
		 * Check if the plugin has registered a settings page
		 * and if it has, make sure only to enqueue the scripts on the relevant screens
		 */

		if ( isset( $this->plugin_screen_slug ) ) {

			/*
			 * Check if current screen is the admin page for this plugin
			 * Don't enqueue stylesheet or JavaScript if it's not
			 */

			$screen = get_current_screen();
			if ( $screen->id == $this->plugin_screen_slug ) {
				wp_enqueue_script( 'plugin-name-admin-script', plugins_url('js/admin.js', __FILE__), array( 'jquery' ), PLUGIN_NAME_VERSION );
			}

		}

	}

	/**
	 * Registers and enqueues public-facing stylesheets.
	 *
	 * @since    1.0.0
	 */
	public function register_plugin_styles() {
		wp_enqueue_style( 'plugin-name-plugin-styles', plugins_url( 'css/display.css', __FILE__ ), PLUGIN_NAME_VERSION );
	}

	/**
	 * Registers and enqueues public-facing JavaScript.
	 *
	 * @since    1.0.0
	 */
	public function register_plugin_scripts() {
		wp_enqueue_script( 'plugin-name-plugin-script', plugins_url( 'js/display.js', __FILE__ ), array( 'jquery' ), PLUGIN_NAME_VERSION );
	}

	/**
	 * Registers the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since    1.0.0
	 */
	public function add_plugin_admin_menu() {

		/*
		 * TODO:
		 *
		 * Change 'Page Title' to the title of your plugin admin page
		 * Change 'Menu Text' to the text for menu item for the plugin settings page
		 * Change 'plugin-name' to the name of your plugin
		 */
		$this->plugin_screen_slug = add_plugins_page(
			__('Page Title', 'plugin-name-locale'),
			__('Menu Text', 'plugin-name-locale'),
			'read',
			'plugin-name',
			array( $this, 'display_plugin_admin_page' )
		);

	}

	/**
	 * Renders the options page for this plugin.
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_admin_page() {
		include_once('views/admin.php');
	}

	/*
	 * NOTE:  Actions are points in the execution of a page or process
	 *        lifecycle that WordPress fires.
	 *
	 *        WordPress Actions: http://codex.wordpress.org/Plugin_API#Actions
	 *        Action Reference:  http://codex.wordpress.org/Plugin_API/Action_Reference
	 *
	 * @since    1.0.0
	 */
	public function action_method_name() {
		// TODO: Define your action method here
	}

	/*
	 * NOTE:  Filters are points of execution in which WordPress modifies data
	 *        before saving it or sending it to the browser.
	 *
	 *        WordPress Filters: http://codex.wordpress.org/Plugin_API#Filters
	 *        Filter Reference:  http://codex.wordpress.org/Plugin_API/Filter_Reference
	 *
	 * @since       1.0.0
	 */
	public function filter_method_name() {
		// TODO: Define your filter method here
	}

}