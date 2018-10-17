<?php
/**
 * Class responsible for scheduling and un-scheduling events (cron jobs).
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 */

/**
 * Class responsible for scheduling and un-scheduling events (cron jobs).
 *
 * This class defines all code necessary to schedule and un-schedule cron jobs.
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Cron {

	const PLUGIN_NAME_EVENT_DAILY_HOOK = 'plugin_name_event_daily';

	/**
	 * Check if already scheduled, and schedule if not.
	 */
	public static function schedule() {
		if ( ! self::next_scheduled_daily() ) {
			self::daily_schedule();
		}
	}

	/**
	 * Unschedule.
	 */
	public static function unschedule() {
		wp_clear_scheduled_hook( self::PLUGIN_NAME_EVENT_DAILY_HOOK );
	}

	/**
	 * @return false|int Returns false if not scheduled, or timestamp of next run.
	 */
	private static function next_scheduled_daily() {
		return wp_next_scheduled( self::PLUGIN_NAME_EVENT_DAILY_HOOK );
	}

	/**
	 * Create new schedule.
	 */
	private static function daily_schedule() {
		wp_schedule_event( time(), 'daily', self::PLUGIN_NAME_EVENT_DAILY_HOOK );
	}
}
