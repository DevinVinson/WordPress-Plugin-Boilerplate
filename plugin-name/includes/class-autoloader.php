<?php
/**
 * Autoloader class.
 *
 * @version     1.0.0
 * @package     Plugin_Name
 */

namespace Plugin_Name;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Autoloader.
 */
class Autoloader {

	/**
	 * Path to the includes directory.
	 *
	 * @var string
	 */
	private $include_path = '';

	/**
	 * The Constructor.
	 */
	public function __construct() {
		if ( function_exists( '__autoload' ) ) {
			spl_autoload_register( '__autoload' );
		}

		spl_autoload_register( array( $this, 'autoload' ) );

		$this->include_path = untrailingslashit( PLUGIN_FILE ) . '/includes/';
	}

	/**
	 * Take a class name and turn it into a file name.
	 *
	 * @param  string $class Class to get filename for.
	 * @return string
	 */
	private function get_file_name_from_class( $class ) {
		return 'class-' . str_replace( '_', '-', $class ) . '.php';
	}

	/**
	 * Include a class file.
	 *
	 * @param  string $path Path to load.
	 * @return bool successful or not
	 */
	private function load_file( $path ) {
		if ( $path && is_readable( $path ) ) {
			require_once $path;
			return true;
		}
		return false;
	}

	/**
	 * Auto-load classes on demand to reduce memory consumption.
	 *
	 * @param string $_class Class to attempt autoloading.
	 */
	public function autoload( $_class ) {
		$prefix = 'Plugin_Name\\';
		if ( 0 !== strpos( $_class, $prefix ) ) {
			return;
		}

		$class = strtolower( $_class );
		$class = substr( $class, strlen( $prefix ) );

		$path = explode( '\\', $class );

		$class = array_pop( $path );

		$file = $this->get_file_name_from_class( $class );

		$path = implode( DIRECTORY_SEPARATOR, $path );

		if ( empty( $path ) ) {
			$path = $this->include_path;
		} else {
			$path = $this->include_path . $path . DIRECTORY_SEPARATOR;
		}

		$this->load_file( $path . $file );
	}
}
