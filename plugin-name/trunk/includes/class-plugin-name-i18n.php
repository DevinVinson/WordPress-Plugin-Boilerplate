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
class Plugin_Name_i18n {

	/**
	 * Short description. (use period)
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      type    $domain    Description.
	 */
	private $domain;

	/**
	 *
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		$locale = apply_filters( 'plugin_locale', get_locale(), $this->domain );

		load_textdomain( $this->domain, trailingslashit( WP_LANG_DIR ) . $this->domain . '/' . $this->domain . '-' . $locale . '.mo' );
		load_plugin_textdomain( $this->domain, FALSE, basename( plugin_dir_path( dirname( __FILE__ ) ) ) . '/languages/' );

	}

	/**
	 * Short description. (use period)
	 *
	 * Long description.
	 *
	 * @since    1.0.0
	 * @param    float    $domain    TODO
	 */
	public function set_domain( $domain ) {
		$this->domain = $domain;
	}

}
