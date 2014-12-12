<?php

class Plugin_Name_Models
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @var      string $plugin_name The name of this plugin.
	 * @var      string $version     The version of this plugin.
	 */
	public function __construct ( $plugin_name , $version )
	{

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

}
