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
	exit; // Exit if accessed directly.
}

/**
 * PName_Admin class.
 */
class PName_Admin {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->includes();
		add_action( 'current_screen', array( $this, 'conditional_includes' ) );
	}

	/**
	 * Include any classes we need within admin.
	 */
	public function includes() {
		include_once 'plugin-name-admin-functions.php';
		include_once 'class-pname-admin-assets.php';
	}

	/**
	 * Include admin files conditionally.
	 */
	public function conditional_includes() {
		$screen = get_current_screen();
		if ( ! $screen ) {
			return;
		}

		switch ( $screen->id ) {
			case 'dashboard':
			case 'options-permalink':
			case 'users':
			case 'user':
			case 'profile':
			case 'user-edit':
		}
	}
}

return new PName_Admin();
