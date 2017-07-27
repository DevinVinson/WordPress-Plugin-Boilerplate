<?php
/**
 * WordPress Plugin Boilerplate Admin
 *
 * @class    PName_Admin
 * @author   Your Name or Your Company
 * @category Admin
 * @package  Plugin_Name/Admin
 * @version  2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * PName_Admin class.
 */
class PName_Admin {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'includes' ) );
		add_action( 'current_screen', array( $this, 'conditional_includes' ) );
		add_action( 'admin_init', array( $this, 'buffer' ), 1 );
	}

	/**
	 * Output buffering allows admin screens to make redirects later on.
	 */
	public function buffer() {
		ob_start();
	}

	/**
	 * Include any classes we need within admin.
	 */
	public function includes() {
		include_once( 'plugin-name-admin-functions.php' );
		include_once( 'class-plugin-name-admin-assets.php' );
	}

	/**
	 * Include admin files conditionally.
	 */
	public function conditional_includes() {
		if ( ! $screen = get_current_screen() ) {
			return;
		}

		switch ( $screen->id ) {
			case 'dashboard' :
			case 'options-permalink' :
			case 'users' :
			case 'user' :
			case 'profile' :
			case 'user-edit' :
		}
	}
}

return new PName_Admin();
