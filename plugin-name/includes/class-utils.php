<?php
/**
 * Utility Functions
 *
 * Functions used across the plugin that are just useful.
 *
 * @package  Plugin_Name
 * @version  1.0.0
 */

namespace Plugin_Name;

/**
 * Template Class.
 */
class Utils {


	/**
	 * Get the plugin url.
	 *
	 * @return string
	 */
	public static function plugin_url() {
		return untrailingslashit( plugins_url( '/', __FILE__ ) );
	}

	/**
	 * Get the plugin path.
	 *
	 * @return string
	 */
	public static function plugin_path() {
		return untrailingslashit( plugin_dir_path( __FILE__ ) );
	}

	/**
	 * Get the template path.
	 *
	 * @return string
	 */
	public static function template_path() {
		return apply_filters( 'plugin_name_template_path', 'plugin-name/' );
	}

	/**
	 * Get Ajax URL.
	 *
	 * @return string
	 */
	public static function ajax_url() {
		return admin_url( 'admin-ajax.php', 'relative' );
	}
}
