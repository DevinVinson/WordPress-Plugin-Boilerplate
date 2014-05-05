<?php

/**
 * Define a short description for what this class does (no period)
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 * @license    GPL-2.0+
 * @link       http://example.com
 * @copyright  2014 Your Name or Company Name
 * @since      1.0.0
 */

/**
 * Define a short description for what this class does.
 *
 * Define a longer description for the purpose of this class.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 */
class Plugin_Name {

	protected $plugin_slug = 'plugin-name-slug';

	protected $version = '1.0.0';

	protected $loader;

	public function __construct( Plugin_Name_Loader $loader = NULL ) {
		$this->loader = $loader;
	}

	public function run() {
		$this->loader->run();
	}

	/**
	 * This class is used to define common functionality that exists between
	 * both the dashboard and the public-facing side of the website. Think
	 * of this as a shared class.
	 *
	 * If any hooks are defined in this class, then they should be defined
	 * in their respective Loader classes (that is, Plugin_Name_Admin_Loader
	 * or Plugin_Name_Public_Loader).
	 *
	 * An instance of this class should then be passed to the loader.
	 */

}
