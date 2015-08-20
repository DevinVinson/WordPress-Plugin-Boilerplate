<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://pandammonium.org/dev/wp-blipper/
 * @since      0.0.1
 *
 * @package    WP_Blipper
 * @subpackage WP_Blipper/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    WP_Blipper
 * @subpackage WP_Blipper/admin
 * @author     Caity Ross internet@pandammonium.org
 */
class WP_Blipper_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.0.1
	 * @access   private
	 * @var      string    $wp_blipper    The ID of this plugin.
	 */
	private $wp_blipper;

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
	 * @param      string    $wp_blipper       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $wp_blipper, $version ) {

		$this->wp_blipper = $wp_blipper;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    0.0.1
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in WP_Blipper_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WP_Blipper_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->wp_blipper, plugin_dir_url( __FILE__ ) . 'css/wp-blipper-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    0.0.1
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in WP_Blipper_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WP_Blipper_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->wp_blipper, plugin_dir_url( __FILE__ ) . 'js/wp-blipper-admin.js', array( 'jquery' ), $this->version, false );

	}

}
