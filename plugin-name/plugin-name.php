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
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-name
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
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */

class Plugin_Name_Init {

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'PLUGIN_NAME_VERSION' ) ) {
			$version = PLUGIN_NAME_VERSION;
		} else {
			$version = '1.0.0';
		}
		$plugin_name = 'plugin-name';

		register_activation_hook( __FILE__, array($this, 'activate_plugin_name') );
		register_deactivation_hook( __FILE__, array($this, 'deactivate_plugin_name') );

		$this->load_dependencies();
		$this->set_locale();
		$this->define_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Plugin_Name_i18n. Defines internationalization functionality.
	 *  
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {
		
		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name-i18n.php';

		/**
		 * The class responsible for defining all actions that occur.
		 */
		require_once plugin_dir_path( __FILE__ ) . 'class-plugin-name.php';

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Plugin_Name_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Plugin_Name_i18n();

		add_action( 'plugins_loaded', array($plugin_i18n, 'load_plugin_textdomain'));

	}

	/**
	 * Register the hooks of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_hooks() {

		$plugin = new Plugin_Name( $this->get_plugin_name(), $this->get_version() );

		add_action( 'admin_enqueue_scripts', array($plugin, 'enqueue_styles') );
		add_action( 'admin_enqueue_scripts', array($plugin, 'enqueue_scripts') );
		
		/**
		 * The following lines will load public Front-end CSS/JS.
		 * In case of use, files should be created and methods should be implemented,
		 * Methods defined for 'admin_enqueue_scripts' hook could be used as templates.
		 */
		// add_action( 'wp_enqueue_scripts', array($plugin, 'enqueue_public_styles') );
		// add_action( 'wp_enqueue_scripts', array($plugin, 'enqueue_public_scripts') );

	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * The code that runs during plugin activation.
	 */
	function activate_plugin_name() {
		/**
		 * Fired during plugin activation.
		 *
		 * This class defines all code necessary to run during the plugin's activation.
		 *
		 *
		 */
	}

	/**
	 * The code that runs during plugin deactivation.
	 */
	function deactivate_plugin_name() {
		/**
		 * Fired during plugin deactivation.
		 *
		 * This class defines all code necessary to run during the plugin's deactivation.
		 */
	}

}

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
$plugin = new Plugin_Name_Init();
