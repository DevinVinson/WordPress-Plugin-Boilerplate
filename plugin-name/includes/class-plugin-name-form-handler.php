<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Handle frontend forms.
 *
 * @class 		PName_Form_Handler
 * @version		1.0.0
 * @package		Plugin_Name/Classes/
 * @category	Class
 * @author 		Your Name or Your Company
 */
class PName_Form_Handler {

	/**
	 * Hook in methods.
	 */
	public static function init() {
		// add_action( 'wp_loaded', array( __CLASS__, 'sample_callback' ), 20 );
	}

	/**
	 * This is a sample callback function.
	 */
	public static function sample_callback() {

	}
}

PName_Form_Handler::init();
