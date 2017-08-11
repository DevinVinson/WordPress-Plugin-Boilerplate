<?php
/**
 * Installation related functions and actions.
 *
 * @author   Your Name or Your Company
 * @category Admin
 * @package  Plugin_Name/Classes
 * @version  1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * PName_Install Class.
 */
class PName_Install {

	/**
	 * Install PName.
	 */
	public static function install() {
		// PERFORM INSTALL ACTIONS HERE

		// Trigger action
		do_action( 'plugin_name_installed' );
	}
}

register_activation_hook( __FILE__, array( 'PName_Install', 'install' ) );