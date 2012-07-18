<?php 
! defined( 'ABSPATH' ) AND exit;

if( ! class_exists( 'PluginName' ) ){

	class PluginName {
	
		
		private static $plugin_obj = false;
		
		/**
		 * Constructor
		 *
		 * Initializes the plugin by setting localization, filters, and administration functions.
		 * 
		 *
		 * @param array $plugin_data plugin data like Autor, Version, Name ...
		 */
		function __construct( $plugin_data ) {
			
			//Catch some useful information about the pluign in the $plugin_obj
			self::$plugin_obj->class_name 	= __CLASS__;
			self::$plugin_obj->name 		= self::set_plugin_name();
			self::$plugin_obj->path 		= str_replace( '/inc', '', plugin_dir_path(__FILE__) );
			self::$plugin_obj->url 			= str_replace( '/inc', '', plugin_dir_url(__FILE__) );
			self::$plugin_obj->Version		= $plugin_data['Version'];
			
			//
			load_plugin_textdomain( self::$plugin_obj->class_name . '_lang', false, dirname( plugin_basename( __FILE__ ) ) . '/lang' );
			
			// Register admin styles and scripts
			add_action( 'admin_print_styles', array( &$this, 'register_admin_styles' ) );
			add_action( 'admin_enqueue_scripts', array( &$this, 'register_admin_scripts' ) );
		
			// Register site styles and scripts
			add_action( 'wp_print_styles', array( &$this, 'register_plugin_styles' ) );
			add_action( 'wp_enqueue_scripts', array( &$this, 'register_plugin_scripts' ) );
			
			register_activation_hook( __FILE__, array( &$this, 'activate' ) );
			register_deactivation_hook( __FILE__, array( &$this, 'deactivate' ) );
			
		    /*
		     * TODO:
		     * Define the custom functionality for your plugin. The first parameter of the
		     * add_action/add_filter calls are the hooks into which your code should fire.
		     *
		     * The second parameter is the function name located within this class. See the stubs
		     * later in the file.
		     *
		     * For more information: 
		     * http://codex.wordpress.org/Plugin_API#Hooks.2C_Actions_and_Filters
		     */
		    add_action( 'TODO', array( $this, 'action_method_name' ) );
		    add_filter( 'TODO', array( $this, 'filter_method_name' ) );
	
		} // end constructor
		
		/**
		 * Fired when the plugin is activated.
		 *
		 * @params	$network_wide	True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog 
		 */
		function activate( $network_wide ) {
			// TODO define activation functionality here
		} // end activate
		
		/**
		 * Fired when the plugin is deactivated.
		 *
		 * @params	$network_wide	True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog 
		 */
		function deactivate( $network_wide ) {
			// TODO define deactivation functionality here		
		} // end deactivate
		
		/**
		 * Registers and enqueues admin-specific styles.
		 */
		public function register_admin_styles() {
			wp_register_style( self::$plugin_obj->name . '-admin-styles', plugins_url( self::$plugin_obj->name . '/css/admin.css' ) );
			wp_enqueue_style( self::$plugin_obj->name . '-admin-styles' );
		
		} // end register_admin_styles
	
		/**
		 * Registers and enqueues admin-specific JavaScript.
		 */	
		public function register_admin_scripts() {
			wp_register_script( self::$plugin_obj->name . '-admin-script', plugins_url( self::$plugin_obj->name . '/js/admin.js' ) );
			wp_enqueue_script( self::$plugin_obj->name . '-admin-script' );
		
		} // end register_admin_scripts
		
		/**
		 * Registers and enqueues plugin-specific styles.
		 */
		public function register_plugin_styles() {
			wp_register_style( self::$plugin_obj->name . '-plugin-styles', plugins_url( self::$plugin_obj->name . '/css/display.css' ) );
			wp_enqueue_style( self::$plugin_obj->name . '-plugin-styles' );
		
		} // end register_plugin_styles
		
		/**
		 * Registers and enqueues plugin-specific scripts.
		 */
		public function register_plugin_scripts() {
			wp_register_script( self::$plugin_obj->name . '-plugin-script', plugins_url( self::$plugin_obj->name . '/js/display.js' ) );
			wp_enqueue_script( self::$plugin_obj->name . '-plugin-script' );
		
		} // end register_plugin_scripts
		
		
		public function set_plugin_name(){
			$plugin_basename = explode( '/', plugin_basename(__FILE__) );
			return $plugin_basename[0];
		}
		
		
		/*--------------------------------------------*
		 * Core Functions
		 *---------------------------------------------*/
		
		/**
	 	 * Note:  Actions are points in the execution of a page or process
		 *        lifecycle that WordPress fires.
		 *
		 *		  WordPress Actions: http://codex.wordpress.org/Plugin_API#Actions
		 *		  Action Reference:  http://codex.wordpress.org/Plugin_API/Action_Reference
		 *
		 */
		function action_method_name() {
	    	// TODO define your action method here
		} // end action_method_name
		
		/**
		 * Note:  Filters are points of execution in which WordPress modifies data
		 *        before saving it or sending it to the browser.
		 *
		 *		  WordPress Filters: http://codex.wordpress.org/Plugin_API#Filters
		 *		  Filter Reference:  http://codex.wordpress.org/Plugin_API/Filter_Reference
		 *
		 */
		function filter_method_name() {
		    // TODO define your filter method here
		} // end filter_method_name
	  
	} // end class

}
?>