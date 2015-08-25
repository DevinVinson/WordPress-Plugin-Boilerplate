<?php

/**
 * A class definition that creates a Polaroid|Blipfoto object and adds the image to the widget.
 *
 * @link       http://pandammonium.org/dev/wp-blipper/
 * @since      0.0.1
 *
 * @package    WP_Blipper_Interface
 * @subpackage WP_Blipper_Interface/admin
 */

defined( 'ABSPATH' ) or die();
defined( 'WPINC' ) or die();

use Blipfoto\Api\Client;

class WP_Blipper_Interface {
  /**
   * The Polaroid|Blipfoto client
   *
   * @since    0.0.1
   * @access   private
   * @var      Blipfoto\Api\Client    $client    The Polaroid|Blipfoto client
   */
  private $client;

  /**
   * Make a new instance of the blip.
   *
   * @since 0.0.1
   * @access public
   */
  public function __construct() {

    $this->load_blipfoto_dependencies();

  }

  /**
   * Load the Blipfoto API.
   *
   * @since 0.0.1
   * @access public
   */
  private function load_blipfoto_dependencies() {

    $folders = array(
        'Traits' => array(
          'Helper'
          ),
        'Exceptions' => array(
          'BaseException',
          'ApiResponseException',
          'InvalidResponseException',
          'NetworkException',
          'OAuthException',
          'FileException'
          ),
        'Api' => array(
          'Client',
          'OAuth',
          'Request',
          'Response',
          'File'
          )
        );

    $path = plugin_dir_path( dirname( __FILE__ ) ) . 'blipfoto-sdk/src/Blipfoto/';

//    echo '<ol>';
    foreach ( $folders as $folder => $files ) {
//      echo '<li>' . $folder . '<ol>';
      foreach ( $files as $file ) {
//        echo '<li>' . $file . '</li>';
        require( $path . $folder . '/' . $file . '.php' );
      }
//      echo '</ol></li>';
    }
//    echo '</ol>';
  }

}