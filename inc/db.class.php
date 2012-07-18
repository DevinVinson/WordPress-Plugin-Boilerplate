<?php



class PluginName_db_class extends PluginName {
	
	private static $prefix	 		= "plugin_prefix";
	private static $plugin_table 	= "_plugin";
	private static $DB				= false;
	
	
	function __construct() {
		self::set_db_table_name();
	}
	
	public function create_db_tables(){	
        global $wpdb;

		 if ( ! empty($wpdb->charset) )
	            $charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
	        if ( ! empty($wpdb->collate) )
	            $charset_collate .= " COLLATE $wpdb->collate";

	        $sql = "CREATE TABLE " . self::$DB->plugin_table . " (
			  id mediumint(8) unsigned not null auto_increment,	
			  value VARCHAR( 255 ) NOT NULL ,
			  PRIMARY KEY  (id)
			)$charset_collate;";
			
			require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
			dbDelta($sql);
	}
	
	public function drop_tables(){
		global $wpdb;
		
		foreach(self::$DB as $table ){
			$wpdb->query("DROP TABLE IF EXISTS " . $table);	
		}
	}


	public function set_db_table_name(){
		global $wpdb;

		self::$DB->plugin_table = $wpdb->prefix . self::$prefix . self::$plugin_table;
		
		$wpdb->PluginName_db_class = self::$DB;

	}
	
}

?>