<?php

/**
 * The WP-CLI functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 */

/**
 * The WP- CLI functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 * @author     Your Name <email@example.com>
 */

class Plugin_Name_Admin_CLI extends WP_CLI_Command {
	/**
	 * Example Hello World custom WP-CLI command
	 *
	 * @param array $args Command arguments array.
	 * @param array $assoc_args Associated arguments array.
	 */
	public function helloworld( $args, $assoc_args ) {
		WP_CLI::log( 'Hello World!' );
	}
}
