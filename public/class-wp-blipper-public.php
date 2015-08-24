<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://pandammonium.org/dev/wp-blipper/
 * @since      0.0.1
 *
 * @package    Wp_Blipper
 * @subpackage Wp_Blipper/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Blipper
 * @subpackage Wp_Blipper/public
 * @author     Caity Ross internet@pandammonium.org
 */
class Wp_Blipper_Public {

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
	 * The widget
	 *
	 * @since    0.0.1
	 * @access   private
	 * @var      string    $wp_blipper    The ID of this plugin.
	 */
	private $wp_blipper_widget;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.0.1
	 * @param      string    $wp_blipper       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $wp_blipper, $version ) {

		$this->wp_blipper = $wp_blipper;
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
		 * defined in Wp_Blipper_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Blipper_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->wp_blipper, plugin_dir_url( __FILE__ ) . 'css/wp-blipper-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    0.0.1
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Blipper_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Blipper_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->wp_blipper, plugin_dir_url( __FILE__ ) . 'js/wp-blipper-public.js', array( 'jquery' ), $this->version, false );

	}

}
