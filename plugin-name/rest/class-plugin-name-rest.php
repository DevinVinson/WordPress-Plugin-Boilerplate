<?php
/**
 * The rest functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and examples to create your REST access
 * methods. Don't forget to validate and sanatize incoming data!
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Rest  {
	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * The text domain of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_text_domain    The text domain of this plugin.
	 */
	private $plugin_text_domain;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since       1.0.0
	 * @param       string $plugin_name        The name of this plugin.
	 * @param       string $version            The version of this plugin.
	 * @param       string $plugin_text_domain The text domain of this plugin.
	 */
	public function __construct( $plugin_name, $version) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	public function register_routes() {

  	$version = '1';
    $namespace = 'pilotdata/v' . $version;
    $base = 'route';    // ntfs: /wp-json/plugin_name/v1
    	register_rest_route( $namespace, '/plugin_name/', 
    		array(
    	    'methods'  => \WP_REST_Server::READABLE,
        	// Here we register our callback. The callback is fired when this endpoint is matched by the WP_REST_Server class.
        	'callback' => array( $this, 'plugin_name_get_callback' ),
        	// Here we register our permissions callback. The callback is fired before the main callback to check if the current user can access the endpoint.
       		'permission_callback' => array($this, 'plugin_name_private_access_check' ),), 
       		array(
    	    'methods'  => \WP_REST_Server::CREATABLE,
        	// Here we register our callback. The callback is fired when this endpoint is matched by the WP_REST_Server class.
        	'callback' => array( $this, 'plugin_name_post_callback' ),
        	// Here we register our permissions callback. The callback is fired before the main callback to check if the current user can access the endpoint.
       		'permission_callback' => array($this, 'plugin_name_private_access_check' ),),       	
    		array(	
    	   	'methods'  => \WP_REST_Server::EDITABLE,  
        	// Here we register our callback. The callback is fired when this endpoint is matched by the WP_REST_Server class.
        	'callback' => array( $this, 'plugin_name_put_pilotdata' ),
        	// Here we register our permissions callback. The callback is fired before the main callback to check if the current user can access the endpoint.
       		'permission_callback' => array($this, 'plugin_name_private_access_check' ),),
       		array (
       		 'methods'  => \WP_REST_Server::DELETABLE,
        	// Here we register our callback. The callback is fired when this endpoint is matched by the WP_REST_Server class.
        	'callback' => array( $this, 'plugin_name_delete_callback' ),
        	// Here we register our permissions callback. The callback is fired before the main callback to check if the current user can access the endpoint.
       		'permission_callback' => array($this, 'plugin_name_private_access_check' ),        	 		      		
    	));	
    }
      
	public function plugin_name_private_access_check(){
	// put your access requirements here. You might have different requirements for each
	// access method. I'm showing only one here. 
    	if ( ! (current_user_can( 'edit_users' ) || current_user_can('edit_gc_operations') || current_user_can('edit_gc_dues') ||
    		current_user_can('edit_gc_instruction') || current_user_can('edit_gc_tow') || current_user_can('edit_gc_tow') || current_user_can('read') 
    	)) {
     	   return new \WP_Error( 'rest_forbidden', esc_html__( 'Sorry, you are not authorized for that.', 'my-text-domain' ), array( 'status' => 401 ) );
    	}
    	// This is a black-listing approach. You could alternatively do this via white-listing, by returning false here and changing the permissions check.
    	return true;	
	}
	public function plugin_name_get_callback( \WP_REST_Request $request) {
		/* 
			Process your GET request here.		
		*/
	}	
	public function plugin_name_post_pilotdata( \WP_REST_Request $request) {
		/* 
			Process your POST request here.
		*/
	}
	public function plugin_name_put_pilotdata( \WP_REST_Request $request) {
		/* 
			Process your PUT request here.
		*/
	}
	public function plugin_name_delete_pilotdata( \WP_REST_Request $request) {
		/* 
			Process your DELETE request here.			
		*/
	}	
}

	
	

