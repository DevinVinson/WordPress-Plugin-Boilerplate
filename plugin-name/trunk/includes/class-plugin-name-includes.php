<?php

/**
 * The includes-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 */

/**
 * The includes-specific functionality of the plugin.
 *
 * Defines the plugin name, version, widgets, and a sample method that registers the plugin's widgets.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Includes {

	/**
	 * The ID of this plugin.
	 *
	 * @since	1.0.0
	 * @access	private
	 * @var		string		$plugin_name		The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since 	1.0.0
	 * @access 	private
	 * @var		string		$version		The current version of this plugin.
	 */
	private $version;

	/**
	 * The widgets of this plugin.
	 *
	 * @since 	1.0.0
	 * @access 	private
	 * @var		array		$widgets		The widgets of this plugin.
	 */
	private $widgets = array (
		'Plugin_Name_Widget',
	);

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 	1.0.0
	 * @param	string		$plugin_name		The name of this plugin.
	 * @param	string		$version		The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Registers this plugin's widgets.
	 *
	 * @since	1.0.0
	 * @access	public
	 */
	public function register_widgets() {
		array_walk( $this->widgets, 'register_widget' );
	}

}
