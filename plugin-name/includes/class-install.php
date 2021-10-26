<?php
/**
 * Installation related functions and actions.
 *
 * @package  Plugin_Name/Classes
 * @version  1.0.0
 */

namespace Plugin_Name;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * PName_Install Class.
 */
class Install {

	/**
	 * Install PName.
	 */
	public static function install() {
		// PERFORM INSTALL ACTIONS HERE.

		// Trigger action.
		do_action( 'plugin_name_installed' );
	}
}
