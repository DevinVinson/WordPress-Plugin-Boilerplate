<?php

class PluginName_unistall_class extends PluginName {
	
	
	
	function __construct() {
		
		// Include the Database class
		require_once( parent::$plugin_obj->include_path  . "/db.class.php" );
		
		/*
		 * Init the Database class
		 *
		 * TODO: 
		 * Go to the db.class.php and replace PluginName with your new plugin name,
		 * like this class MyAwsome_Plugin extends MyAwsome_Plugin_db_class 
		*/
		$db = new PluginName_db_class();

		// drop DB
		$db->drop_tables();
		
		self::cleanup_options();
	}

	
	private function cleanup_options(){
		global $wpdb;
		
		$options = $wpdb->get_results("SELECT * FROM `" . $wpdb->options . "` WHERE  `option_name` LIKE  'PluginName%'"); 
		
		foreach( $options as $option ){
			$wpdb->query( "DELETE FROM `" . $wpdb->dbname . "`.`" . $wpdb->options . "` WHERE `" . $wpdb->options . "`.`option_id` = " . $option->option_id  );
		}
		
		add_action('admin_notices', array( &$this, 'unistall_admin_notice' ) );
		
	}

	public function unistall_admin_notice(){
		echo '<div id="message" class="updated"><p>'. __( '<b>the Plugin</b> is now deinstalled and cleaned up!', parent::$plugin_obj->class_name ) .'</p></div>';
	}

}