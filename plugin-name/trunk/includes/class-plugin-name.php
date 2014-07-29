<?php

/**
 * Short Description (no period)
 *
 * Long Description.
 *
 * @link       http://example.com/
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 */

/**
 * Short Description. (use period)
 *
 * Long Description.
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 */
class Plugin_Name {

	/**
	 * Short Description. (use period)
	 *
	 * @since    1.0.0
	 * @access   (private, protected, or public)
	 * @var      type    $var    Description.
	 */
	protected $loader;

	/**
	 * Short Description. (use period)
	 *
	 * @since    1.0.0
	 * @access   (private, protected, or public)
	 * @var      type    $var    Description.
	 */
	protected $plugin_slug;

	/**
	 * Short Description. (use period)
	 *
	 * @since    1.0.0
	 * @access   (private, protected, or public)
	 * @var      type    $var    Description.
	 */
	protected $version;

	/**
	 * Short Description. (use period)
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->plugin_slug = 'plugin-name-slug';
		$this->version = '1.0.0';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 * @access   (for functions: only use if private)
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-plugin-name-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-plugin-name-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the Dashboard.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-plugin-name-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-plugin-name-public.php';

		$this->loader = new Plugin_Name_Loader();

	}

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 * @access   (for functions: only use if private)
	 */
	private function set_locale() {

		$plugin_i18n = new Plugin_Name_i18n();
		$plugin_i18n->set_domain( $this->get_plugin_slug() );
		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 * @access   (for functions: only use if private)
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Plugin_Name_Admin( $this->get_version() );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 * @access   (for functions: only use if private)
	 */
	private function define_public_hooks() {

		$plugin_public = new Plugin_Name_Public( $this->get_version() );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since     1.0.0
	 * @return    type    Description
	 */
	public function get_plugin_slug() {
		return $this->plugin_slug;
	}

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since     1.0.0
	 * @return    type    Description
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since     1.0.0
	 * @return    type    Description
	 */
	public function get_version() {
		return $this->version;
	}

}
