<?php
/**
 * Admin area code
 *
 * @package  Plugin_Name/Admin
 * @version  2.6.0
 */

namespace Plugin_Name\Admin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Admin Main class.
 */
class Main {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->includes();
		add_action( 'current_screen', array( $this, 'conditional_includes' ) );
	}

	/**
	 * Include any classes we need within admin.
	 *
	 * @return void
	 */
	public function includes() {
		new Admin_Assets();
	}

	/**
	 * Include admin files conditionally.
	 *
	 * @return void
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
