<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      0.0.1
 *
 * @package    WP_Tinylytics
 * @subpackage WP_Tinylytics/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    WP_Tinylytics
 * @subpackage WP_Tinylytics/public
 * @author     Your Name <email@example.com>
 */
class WP_Tinylytics_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.0.1
	 * @access   private
	 * @var      string    $wp_tinylytics    The ID of this plugin.
	 */
	private $wp_tinylytics;

	/**
	 * The version of this plugin.
	 *
	 * @since    0.0.1
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.0.1
	 * @param      string    $wp_tinylytics       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $wp_tinylytics, $version ) {

		$this->wp_tinylytics = $wp_tinylytics;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    0.0.1
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in WP_Tinylytics_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WP_Tinylytics_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->wp_tinylytics, plugin_dir_url( __FILE__ ) . 'css/wp-tinylytics-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    0.0.1
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in WP_Tinylytics_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WP_Tinylytics_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->wp_tinylytics, plugin_dir_url( __FILE__ ) . 'js/wp-tinylytics-public.js', array( 'jquery' ), $this->version, false );

	}

}
