<?php
/**
 * Autoloader class.
 *
 * @class       PName_Autoloader
 * @version     1.0.0
 * @package     Plugin_Name/Classes/
 */

namespace Plugin_Name;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Plugin_Name Autoloader.
 *
 * @class       PName_Autoloader
 * @version     1.0.0
 * @package     Plugin_Name/Classes
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

		$this->include_path = untrailingslashit( plugin_dir_path( PNAME_PLUGIN_FILE ) ) . '/includes/';
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
			include_once $path;
			return true;
		}
		return false;
	}

	/**
	 * Auto-load PNAME classes on demand to reduce memory consumption.
	 *
	 * @param string $_class Class to attempt autoloading.
	 */
	public function autoload( $_class ) {
		$class  = strtolower( $_class );
		$prefix = 'plugin_name\\';
		if ( 0 !== strpos( $class, $prefix ) ) {
			return;
		}

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
