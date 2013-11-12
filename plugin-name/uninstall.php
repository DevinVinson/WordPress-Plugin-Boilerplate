<?php
/**
 * Fired when the plugin is activated, deactivated or uninstalled.
 * Works in single as well as in Multisite/Network installs.
 *
 * @package   Plugin_Name
 * @author    Your Name <email@example.com>
 * @license   @TODO
 * @link      http://example.com
 * @copyright (c) 2013 "Your Name or Company Name"
 */

defined( 'ABSPATH' ) OR exit;

/**
 * Class PluginNameSetup
 */
class PluginNameSetup
{
	/**
	 * Fired when a new site is activated with a Multisite/Network environment.
	 *
	 * @param integer $blogID ID of the new blog.
	 */
	public function onActivateNewSite( $blogID )
	{
		if ( ! did_action( 'wpmu_new_blog' ) )
			return;

		switch_to_blog( $blogID );
		self::onActivation();
		restore_current_blog();
	}

	/**
	 * Activation router: Single or Multisite/Network deactivation?
	 *
	 * @param boolean $network_wide TRUE if Multisite/Network and superadmin
	 * uses the "Network Activate" action. FALSE is no Multisite install or plugin gets
	 * activated on a single blog.
	 */
	public static function activate( $network_wide )
	{
		if ( $network_wide AND is_multisite() )
		{
			$blogIDs = self::getBlogIDs();
			foreach ( $blogIDs as $ID )
			{
				switch_to_blog( $ID );
				self::onActivation();
			}

			restore_current_blog();
		}
		else
		{
			self::onActivation();
		}
	}

	/**
	 * Deactivation router: Single or Multisite/Network deactivation?
	 *
	 * @param boolean $network_wide TRUE if Multisite/Network and superadmin
	 * uses the "Network Deactivate" action. FALSE is no Multisite install or plugin gets
	 * deactivated on a single blog.
	 */
	public static function deactivate( $network_wide )
	{
		if ( is_multisite() AND $network_wide )
		{
			$blogIDs = self::getBlogIDs();
			foreach ( $blogIDs as $ID )
			{
				switch_to_blog( $ID );
				self::onDeactivation();
			}

			restore_current_blog();
		}
		else
		{
			self::onDeactivation();
		}
	}

	/**
	 * The actual tasks performed during activation of a plugin.
	 * Should handle only stuff that happens during a single site activation,
	 * as the process will repeated for each site on a Multisite/Network installation
	 * if the plugin is activated network wide.
	 */
	public static function onActivation()
	{
		if ( ! current_user_can( 'activate_plugins' ) )
			return;

		$plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
		check_admin_referer( "activate-plugin_{$plugin}" );

		# Uncomment the following line to see the function in action
		# exit( var_dump( $_GET ) );
	}

	/**
	 * The actual tasks performed during deactivation of a plugin.
	 * Should handle only stuff that happens during a single site deactivation,
	 * as the process will repeated for each site on a Multisite/Network installation
	 * if the plugin is deactivated network wide.
	 */
	public static function onDeactivation()
	{
		if ( ! current_user_can( 'activate_plugins' ) )
			return;

		$plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
		check_admin_referer( "deactivate-plugin_{$plugin}" );

		# Uncomment the following line to see the function in action
		# exit( var_dump( $_GET ) );
	}

	/**
	 * The actual tasks performed when a plugin is deleted.
	 * All clean up process should happen in here.
	 */
	public static function onUninstall()
	{
		if ( ! current_user_can( 'activate_plugins' ) )
			return;

		check_admin_referer( 'bulk-plugins' );

		// Important: Check if the file is the one
		// that was registered during the uninstall hook.
		if ( __FILE__ !== WP_UNINSTALL_PLUGIN )
			return;

		# Uncomment the following line to see the function in action
		# exit( var_dump( $_GET ) );
	}

# ===== HELPERS

	/**
	 * Get all blog IDs of blogs in the current network that are not:
	 * archived, spam, deleted
	 *
	 * @return array|boolean The blog IDs, (bool) FALSE if: no matches.
	 */
	private static function getBlogIDs()
	{
		global $wpdb;

		$sql = <<<SQL
SELECT blog_id
FROM {$wpdb->blogs}
WHERE archived = '0'
	AND spam = '0'
	AND deleted = '0'
SQL;

		return $wpdb->get_col( esc_sql( $sql ) );
	}
}