<?php // uninstall remove options

if (!defined('ABSPATH') && !defined('WP_UNINSTALL_PLUGIN')) exit();

// delete options
delete_option('	tinylytics_site_id');
delete_option('	tinylytics_kudos_label');
delete_option('tinylytics_webring_label');
delete_option('tinylytics_hits');
delete_option('tinylytics_stats');
delete_option('tinylytics_uptime');
delete_option('tinylytics_flags');
delete_option('tinylytics_kudos');
delete_option('tinylytics_webring');
delete_option('tinylytics_avatars');