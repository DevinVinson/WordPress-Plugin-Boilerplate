<?php
/**
 * Handle frontend scripts
 *
 * @class       PName_Frontend_Scripts
 * @version     1.0.0
 * @package     Plugin_Name/Classes/
 * @category    Class
 * @author      Your Name or Your Company
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * PName_Frontend_Scripts Class.
 */
class PName_Frontend_Scripts {

	/**
	 * Contains an array of script handles registered by WC.
	 * @var array
	 */
	private static $scripts = array();

	/**
	 * Contains an array of script handles registered by WC.
	 * @var array
	 */
	private static $styles = array();

	/**
	 * Contains an array of script handles localized by WC.
	 * @var array
	 */
	private static $wp_localize_scripts = array();

	/**
	 * Hook in methods.
	 */
	public static function init() {
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'load_scripts' ) );
		add_action( 'wp_print_scripts', array( __CLASS__, 'localize_printed_scripts' ), 5 );
		add_action( 'wp_print_footer_scripts', array( __CLASS__, 'localize_printed_scripts' ), 5 );
	}

	/**
	 * Get styles for the frontend.
	 * @access private
	 * @return array
	 */
	public static function get_styles() {
		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		return apply_filters( 'plugin_name_enqueue_styles', array(
			'plugin-name-general' => array(
				'src'     => str_replace( array( 'http:', 'https:' ), '', PNameSingleton()->plugin_url() ) . '/assets/css/plugin-name' . $suffix . '.css',
				'deps'    => '',
				'version' => PNAME_VERSION,
				'media'   => 'all',
			),
		) );
	}

	/**
	 * Register a script for use.
	 *
	 * @uses   wp_register_script()
	 * @access private
	 * @param  string   $handle
	 * @param  string   $path
	 * @param  string[] $deps
	 * @param  string   $version
	 * @param  boolean  $in_footer
	 */
	private static function register_script( $handle, $path, $deps = array( 'jquery' ), $version = PNAME_VERSION, $in_footer = true ) {
		self::$scripts[] = $handle;
		wp_register_script( $handle, $path, $deps, $version, $in_footer );
	}

	/**
	 * Register and enqueue a script for use.
	 *
	 * @uses   wp_enqueue_script()
	 * @access private
	 * @param  string   $handle
	 * @param  string   $path
	 * @param  string[] $deps
	 * @param  string   $version
	 * @param  boolean  $in_footer
	 */
	private static function enqueue_script( $handle, $path = '', $deps = array( 'jquery' ), $version = PNAME_VERSION, $in_footer = true ) {
		if ( ! in_array( $handle, self::$scripts ) && $path ) {
			self::register_script( $handle, $path, $deps, $version, $in_footer );
		}
		wp_enqueue_script( $handle );
	}

	/**
	 * Register a style for use.
	 *
	 * @uses   wp_register_style()
	 * @access private
	 * @param  string   $handle
	 * @param  string   $path
	 * @param  string[] $deps
	 * @param  string   $version
	 * @param  string   $media
	 */
	private static function register_style( $handle, $path, $deps = array(), $version = PNAME_VERSION, $media = 'all' ) {
		self::$styles[] = $handle;
		wp_register_style( $handle, $path, $deps, $version, $media );
	}

	/**
	 * Register and enqueue a styles for use.
	 *
	 * @uses   wp_enqueue_style()
	 * @access private
	 * @param  string   $handle
	 * @param  string   $path
	 * @param  string[] $deps
	 * @param  string   $version
	 * @param  string   $media
	 */
	private static function enqueue_style( $handle, $path = '', $deps = array(), $version = PNAME_VERSION, $media = 'all' ) {
		if ( ! in_array( $handle, self::$styles ) && $path ) {
			self::register_style( $handle, $path, $deps, $version, $media );
		}
		wp_enqueue_style( $handle );
	}

	/**
	 * Register/queue frontend scripts.
	 */
	public static function load_scripts() {
		global $post;

		if ( ! did_action( 'before_plugin_name_init' ) ) {
			return;
		}

		$suffix               = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		$assets_path          = str_replace( array( 'http:', 'https:' ), '', PNameSingleton()->plugin_url() ) . '/assets/';
		$frontend_script_path = $assets_path . 'js/frontend/';

		// Global frontend scripts
		self::enqueue_script( 'plugin-name', $frontend_script_path . 'plugin-name' . $suffix . '.js', array( 'jquery', 'jquery-blockui' ) );

		// CSS Styles
		if ( $enqueue_styles = self::get_styles() ) {
			foreach ( $enqueue_styles as $handle => $args ) {
				self::enqueue_style( $handle, $args['src'], $args['deps'], $args['version'], $args['media'] );
			}
		}
	}

	/**
	 * Localize a WC script once.
	 * @access private
	 * @since  1.0.0 this needs less wp_script_is() calls due to https://core.trac.wordpress.org/ticket/28404 being added in WP 4.0.
	 * @param  string $handle
	 */
	private static function localize_script( $handle ) {
		if ( ! in_array( $handle, self::$wp_localize_scripts ) && wp_script_is( $handle ) && ( $data = self::get_script_data( $handle ) ) ) {
			$name                        = str_replace( '-', '_', $handle ) . '_params';
			self::$wp_localize_scripts[] = $handle;
			wp_localize_script( $handle, $name, apply_filters( $name, $data ) );
		}
	}

	/**
	 * Return data for script handles.
	 * @access private
	 * @param  string $handle
	 * @return array|bool
	 */
	private static function get_script_data( $handle ) {
		global $wp;

		switch ( $handle ) {
			case 'plugin-name' :
				return array(
					'ajax_url' => PNameSingleton()->ajax_url(),
				);
			break;
		}
		return false;
	}

	/**
	 * Localize scripts only when enqueued.
	 */
	public static function localize_printed_scripts() {
		foreach ( self::$scripts as $handle ) {
			self::localize_script( $handle );
		}
	}
}

PName_Frontend_Scripts::init();
