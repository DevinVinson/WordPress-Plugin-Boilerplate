<?php 
! defined( 'ABSPATH' ) AND exit;

if( ! class_exists( 'PluginName' ) ){

	class PluginName {
	
		
		private static $plugin_obj	= false;
		private static $db 		= false;
		
		/**
		 * Constructor
		 *
		 * Initializes the plugin by setting localization, filters, and administration functions.
		 * 
		 *
		 * @param array $plugin_data plugin data like Autor, Version, Name ...
		 */
		function __construct( $plugin_basename ) {
			
			//Catch some useful information about the pluign in the $plugin_obj
			self::$plugin_obj->class_name 	= __CLASS__;
			self::$plugin_obj->name 	= self::set_plugin_name();
			self::$plugin_obj->base		= $plugin_basename;
			self::$plugin_obj->path 	= str_replace( '/inc', '', plugin_dir_path(__FILE__) );
			self::$plugin_obj->include_path = plugin_dir_path(__FILE__);
			self::$plugin_obj->url 		= str_replace( '/inc', '', plugin_dir_url(__FILE__) );
			self::$plugin_obj->Version	= self::get_plugin_version();
			

			load_plugin_textdomain( self::$plugin_obj->class_name . '_lang', false, self::$plugin_obj->path  . 'lang' );
			

			if(is_admin()){
				
				// Register admin styles and scripts
				add_action( 'admin_print_styles', array( &$this, 'register_admin_styles' ) );
				add_action( 'admin_enqueue_scripts', array( &$this, 'register_admin_scripts' ) );
	
				// add row meta links
				add_filter( 'plugin_row_meta',  array( __CLASS__, 'plugin_row_meta_link' ), 10, 2 );
	
				// Add Uninstall action link
				add_action( 'plugin_action_links_' . self::$plugin_obj->base, array( &$this, 'uninstall_action_link' ) );
	
				// Include the Database class
				require_once( self::$plugin_obj->include_path  . "/db.class.php" );
				
				/*
				 * Init the Database class
				 *
				 * TODO: 
				 * Go to the db.class.php and replace PluginName with your new plugin name,
				 * like this class MyAwsome_Plugin extends MyAwsome_Plugin_db_class 
				*/
				self::$db = new PluginName_db_class();
				
				// Update and setup Database
				self::update_db();
				
			}else{
			
				// Register site styles and scripts
				add_action( 'wp_print_styles', array( &$this, 'register_plugin_styles' ) );
				add_action( 'wp_enqueue_scripts', array( &$this, 'register_plugin_scripts' ) );
				
			}
			
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
		
		
		private function set_plugin_name(){
			$plugin_basename = explode( '/', plugin_basename(__FILE__) );
			return $plugin_basename[0];
		}
		
		
		private function get_plugin_version(){
			
			$filePath = self::$plugin_obj->path . self::$plugin_obj->class_name . '.php';
			
			if(is_readable($filePath)){
	      		$fp = fopen($filePath, 'r');
			
				if(filesize($filePath) > 0){
	      				$content = fread($fp,filesize($filePath));
					preg_match('/Version:\s(.*?)\s/',$content,$version);

					return $version[1];
				}else{
					fclose ($fp);
					return false;
				}
			}
		}
		
		
		private function update_db(){
			
			if( get_option( self::$plugin_obj->class_name  . '_version' ) != self::$plugin_obj->Version ){
			
				update_option( self::$plugin_obj->class_name  . '_version', self::$plugin_obj->Version );
				self::$db->create_db_tables();
			}
			
		}
		
		/**
		  * Add unistall action link for the Plugin!
		  *
		  * @param 	array	$action_links 	the original links by Wordpress
		  * @return arry 	$action_links 	the filtered links
		  *   
		  */
		public function uninstall_action_link( $action_links ){ 
			
		 $action_links['unistall'] = '<span class="delete"><a href="'. admin_url() .'plugins.php?action=unistall&plugin=' . self::$plugin_obj->name  . '" title="Unistall this plugin" class="delete">Unistall</a></span>';
		 return $action_links;
		
		}
				
		
		
		/**
		* Metalinks
		*
		* @param   array   $data  existing links
		* @param   string  $page  current page
		* @return  array   $data  modified links
		*/
		public function plugin_row_meta_link($data, $page){

			if ( $page != self::$plugin_obj->base ) {
				return $data;
			}
        
			return array_merge(
				$data,
				array(
					'<a href="https://plus.google.com/116520935691953756105" target="_blank">Auf Google+ folgen</a>'
				)
			);
			
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