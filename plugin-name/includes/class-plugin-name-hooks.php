<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 */

/**
 * Register all actions and filters for the plugin.
 *
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Hooks {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_action('plugin_name_load_hooks', array($this, 'set_locale'));
		add_action('plugin_name_load_hooks', array($this, 'define_admin_hooks'));
		add_action('plugin_name_load_hooks', array($this, 'define_public_hooks'));

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
	public function set_locale() {

		$plugin_i18n = new Plugin_Name_i18n();

		add_action( 'plugins_loaded', array($plugin_i18n, 'load_plugin_textdomain') );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	public function define_admin_hooks() {

		$plugin_admin = new Plugin_Name_Admin( $this->plugin_name, $this->version );

		add_action( 'admin_enqueue_scripts', array($plugin_admin, 'enqueue_styles') );
		add_action( 'admin_enqueue_scripts', array($plugin_admin, 'enqueue_scripts') );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	public function define_public_hooks() {

		$plugin_public = new Plugin_Name_Public( $this->plugin_name, $this->version );

		add_action( 'wp_enqueue_scripts', array($plugin_public, 'enqueue_styles') );
		add_action( 'wp_enqueue_scripts', array($plugin_public, 'enqueue_scripts') );

	}


	/**
	 * Load all the hooks at once
	 *
	 * @since    1.0.0
	 */
	public function load() {
		do_action('plugin_name_load_hooks');
	}

}
