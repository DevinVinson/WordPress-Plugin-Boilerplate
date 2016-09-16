<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 */
class Plugin_Name {

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
	 * The class responsible for defining internationalization functionality
	 * of the plugin.
	 *
	 * @since   1.0.0
	 * @access  protected
	 * @var     Plugin_Name_i18n
	 */
	protected $i18n;

	/**
	 * The class responsible for defining all actions that occur in the admin area.
	 *
	 * @since   1.0.0
	 * @access  protected
	 * @var     Plugin_Name_Admin
	 */
	protected $admin;

	/**
	 * The class responsible for defining all actions that occur in the public-facing
	 * side of the site.
	 *
	 * @since   1.0.0
	 * @access  protected
	 * @var     Plugin_Name_Public
	 */
	protected $public;


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

		$this->plugin_name = 'plugin-name';
		$this->version = '1.0.0';

	}

	/**
	 * Load the required dependencies for this plugin.	 *
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-plugin-name-i18n.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-plugin-name-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-plugin-name-public.php';
	}

	/**
	 * Load class instances and register hooks
	 *
	 * @since   1.0.0
	 * @access  private
	 */
	private function load_classes(){

		$this->i18n = Plugin_Name_i18n::create($this->get_plugin_name(), $this->get_version());
		$this->public = Plugin_Name_Public::create($this->get_plugin_name(), $this->get_version());
		$this->admin = Plugin_Name_Admin::create($this->get_plugin_name(), $this->get_version());

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since   1.0.0
	 */
	public function run() {

		$this->load_dependencies();
		$this->load_classes();

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

}
