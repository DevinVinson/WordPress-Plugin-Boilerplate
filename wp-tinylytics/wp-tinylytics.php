<?php
/*
Plugin Name: WP Tinylytics
Description: Custom plugin for embedding Tinylytics script.
Version: 1.0.1
Author: Jim Mitchell
*/

if (!defined('ABSPATH')) die();


// *** Hook functions
add_action('admin_init', 'tinylytics_register_settings');
add_action('admin_menu', 'tinylytics_add_menu');
add_action('admin_init', 'tinylytics_settings_fields');
add_action('admin_post_form_update', 'process_tinylytics_form');
add_action('admin_post_nopriv_form_update', 'process_tinylytics_form');


// *** Add plugin settings page
function tinylytics_add_menu() {
    add_options_page('WP Tinylytics Settings', 'WP Tinylytics', 'manage_options', 'tinylytics-settings', 'tinylytics_settings_page');
}


// *** Register plugin settings
function tinylytics_register_settings() {
    register_setting('tinylytics_settings', 'tinylytics_site_id', 'tinylytics_sanitize_text_input');
    register_setting('tinylytics_settings', 'tinylytics_kudos_label', 'tinylytics_sanitize_text_input');
    register_setting('tinylytics_settings', 'tinylytics_webring_label', 'tinylytics_sanitize_text_input');
    register_setting('tinylytics_settings', 'tinylytics_hits', 'tinylytics_sanitize_checkbox');
    register_setting('tinylytics_settings', 'tinylytics_stats', 'tinylytics_sanitize_checkbox');
    register_setting('tinylytics_settings', 'tinylytics_uptime', 'tinylytics_sanitize_checkbox');
    register_setting('tinylytics_settings', 'tinylytics_flags', 'tinylytics_sanitize_checkbox');
    register_setting('tinylytics_settings', 'tinylytics_kudos', 'tinylytics_sanitize_checkbox');
    register_setting('tinylytics_settings', 'tinylytics_webring', 'tinylytics_sanitize_checkbox');
    register_setting('tinylytics_settings', 'tinylytics_avatars', 'tinylytics_sanitize_checkbox');
}


// *** Define text input options
function tinylytics_site_id_callback() {
    $option_value = get_option('tinylytics_site_id');
    echo '<input type="text" name="tinylytics_site_id" value="' . esc_attr($option_value) . '" size="40" />';
}
function tinylytics_kudos_label_callback() {
    $option_value = get_option('tinylytics_kudos_label');
    echo '<input type="text" name="tinylytics_kudos_label" value="' . esc_attr($option_value) . '" size="40" placeholder="Enter any combination of text or emoji 👋" />';
}
function tinylytics_webring_label_callback() {
    $option_value = get_option('tinylytics_webring_label');
    echo '<input type="text" name="tinylytics_webring_label" value="' . esc_attr($option_value) . '" size="40" placeholder="Enter any combination of text or emoji 🕸️💍" />';
}
function tinylytics_boolean_input_callback_hits() {
    $option_value = get_option('tinylytics_hits', 0);
    echo '<input type="checkbox" name="tinylytics_hits" value="1" ' . checked(1, $option_value, false) . ' />';
}
function tinylytics_boolean_input_callback_stats() {
    $option_value = get_option('tinylytics_stats', 0);
    echo '<input type="checkbox" name="tinylytics_stats" value="1" ' . checked(1, $option_value, false) . ' />';
}
function tinylytics_boolean_input_callback_uptime() {
    $option_value = get_option('tinylytics_uptime', 0);
    echo '<input type="checkbox" name="tinylytics_uptime" value="1" ' . checked(1, $option_value, false) . ' />';
}
function tinylytics_boolean_input_callback_flags() {
    $option_value = get_option('tinylytics_flags', 0);
    echo '<input type="checkbox" name="tinylytics_flags" value="1" ' . checked(1, $option_value, false) . ' />';
}
function tinylytics_boolean_input_callback_kudos() {
    $option_value = get_option('tinylytics_kudos', 0);
    echo '<input type="checkbox" name="tinylytics_kudos" value="1" ' . checked(1, $option_value, false) . ' />';
}
function tinylytics_boolean_input_callback_webring() {
    $option_value = get_option('tinylytics_webring', 0);
    echo '<input type="checkbox" name="tinylytics_webring" value="1" ' . checked(1, $option_value, false) . ' />';
}
function tinylytics_boolean_input_callback_avatars() {
    $option_value = get_option('tinylytics_avatars', 0);
    echo '<input type="checkbox" name="tinylytics_avatars" value="1" ' . checked(1, $option_value, false) . ' />';
}

// *** Process admin settings form
function process_tinylytics_form() {
    // Check if the user has the capability to manage options
    if (!current_user_can('manage_options')) {
        wp_die('Access Denied');
    }
    
    // Check if the form nonce is set for security
    if(!wp_verify_nonce($_POST['tinylytics_form_nonce'], 'tiny_analytics')) {
        wp_die('Nonce verification failed! Trying to be sneaky, are we?');
    }

    // Update options from form data
    $site_id = isset($_POST['tinylytics_site_id']) ? $_POST['tinylytics_site_id'] : '';
    update_option('tinylytics_site_id', $site_id);
    $hits = isset($_POST['tinylytics_hits']) ? 1 : 0;
    update_option('tinylytics_hits', $hits);
    $stats = isset($_POST['tinylytics_stats']) ? 1 : 0;
    update_option('tinylytics_stats', $stats);
    $uptime = isset($_POST['tinylytics_uptime']) ? 1 : 0;
    update_option('tinylytics_uptime', $uptime);
    $kudos = isset($_POST['tinylytics_kudos']) ? 1 : 0;
    update_option('tinylytics_kudos', $kudos);
    $kudos_label = isset($_POST['tinylytics_kudos_label']) ? $_POST['tinylytics_kudos_label'] : '';
    update_option('tinylytics_kudos_label', $kudos_label);
    $webring = isset($_POST['tinylytics_webring']) ? 1 : 0;
    update_option('tinylytics_webring', $webring);
    $webring_label = isset($_POST['tinylytics_webring_label']) ? $_POST['tinylytics_webring_label'] : '';
    update_option('tinylytics_webring_label', $webring_label);
    $avatars = isset($_POST['tinylytics_avatars']) ? 1 : 0;
    update_option('tinylytics_avatars', $avatars);
    $flags = isset($_POST['tinylytics_flags']) ? 1 : 0;
    update_option('tinylytics_flags', $flags);

    // Check for any errors trying to update the settings
    if(empty($errors)){
        add_settings_error('tinylytics_msg', 'tinylytics_msg_option', __("Settings saved."), 'success');
    } else {
        add_settings_error('tinylytics_msg', 'tinylytics_msg_option', __("Unable to save. Please try again."), 'warning');
    }
    set_transient('settings_errors', get_settings_errors(), 30);
    
    // Redirect back to the settings page
    wp_redirect(admin_url('options-general.php?page=tinylytics-settings'));
    exit;
}


// *** Define the plugin settings page content
function tinylytics_settings_page() {
    ?>
    <div class="wrap">
        <h1>Tinylytics Settings</h1>
        <?php
            $form_errors = get_transient('settings_errors');
            delete_transient("settings_errors");
            if(!empty($form_errors)){
                foreach($form_errors as $error){
                    echo tinylytics_admin_message($error['message'], $error['type']);
                }
            }
        ?>
        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
            <?php
                wp_nonce_field('tiny_analytics','tinylytics_form_nonce');
                settings_fields('tinylytics_settings');
                do_settings_sections('tinylytics-site');
                do_settings_sections('tinylytics-analytics');
                do_settings_sections('tinylytics-kudos');
                do_settings_sections('tinylytics-webring');
                do_settings_sections('tinylytics-flags');
                submit_button();
            ?>
            <input type="hidden" name="action" value="form_update" />
        </form>
    </div>
    <?php
}


// *** Add plugin settings fields
function tinylytics_settings_fields() {
    add_settings_section('tinylytics_section', 'Site Info', '', 'tinylytics-site');
    add_settings_section('tinylytics_section', 'Analytics', '', 'tinylytics-analytics');
    add_settings_section('tinylytics_section', 'Kudos', '', 'tinylytics-kudos');
    add_settings_section('tinylytics_section', 'Webring', '', 'tinylytics-webring');
    add_settings_section('tinylytics_section', 'Countries', '', 'tinylytics-flags');
    
    add_settings_field('tinylytics_site_id', 'Site Id', 'tinylytics_site_id_callback', 'tinylytics-site', 'tinylytics_section');
    add_settings_field('tinylytics_hits', 'Show hits?', 'tinylytics_boolean_input_callback_hits', 'tinylytics-analytics', 'tinylytics_section');
    add_settings_field('tinylytics_stats', 'Link to your public stats?', 'tinylytics_boolean_input_callback_stats', 'tinylytics-analytics', 'tinylytics_section');
    add_settings_field('tinylytics_uptime', 'Show uptime?', 'tinylytics_boolean_input_callback_uptime', 'tinylytics-analytics', 'tinylytics_section');
    add_settings_field('tinylytics_kudos', 'Show Kudos?', 'tinylytics_boolean_input_callback_kudos', 'tinylytics-kudos', 'tinylytics_section');
    add_settings_field('tinylytics_kudos_label', 'Kudos label:', 'tinylytics_kudos_label_callback', 'tinylytics-kudos', 'tinylytics_section');
    add_settings_field('tinylytics_webring', 'Show webring?', 'tinylytics_boolean_input_callback_webring', 'tinylytics-webring', 'tinylytics_section');
    add_settings_field('tinylytics_webring_label', 'Webring label:', 'tinylytics_webring_label_callback', 'tinylytics-webring', 'tinylytics_section');
    add_settings_field('tinylytics_avatars', 'Show webring avatars?', 'tinylytics_boolean_input_callback_avatars', 'tinylytics-webring', 'tinylytics_section');
    add_settings_field('tinylytics_flags', 'Show country flags?', 'tinylytics_boolean_input_callback_flags', 'tinylytics-flags', 'tinylytics_section');
}


// *** Define the script output function
function tinylytics_output_script() {
    $site_id = get_option('tinylytics_site_id');
    $hits = get_option('tinylytics_hits', 0);
    $stats = get_option('tinylytics_stats', 0);
    $uptime = get_option('tinylytics_uptime', 0);
    $kudos = get_option('tinylytics_kudos', 0);
    $kudos_label = get_option('tinylytics_kudos_label');
    $webring = get_option('tinylytics_webring', 0);
    $webring_label = get_option('tinylytics_webring_label');
    $avatars = get_option('tinylytics_avatars', 0);
	$flags = get_option('tinylytics_flags', 0);
	
    if (!empty($site_id)) {
        $script_url = "https://tinylytics.app/embed/{$site_id}.js?";
        $script_url .= $hits ? 'hits&' : '';
        $script_url .= $stats ? 'stats&' : '';
        $script_url .= $uptime ? 'uptime&' : '';
        $script_url .= $kudos && !$kudos_label ? 'kudos&' : '';
        $script_url .= $kudos && $kudos_label ? 'kudos=' . $kudos_label . '&' : '';
        $script_url .= $webring && !$avatars ? 'webring&' : '';
        $script_url .= $webring && $avatars ? 'webring=' : '';
        $script_url .= $avatars ? 'avatars&' : '';
        $script_url .= $flags ? 'countries&' : '';
        $script_url = rtrim(rtrim($script_url, '&'), '?');
        
        echo '<script defer="defer" src="' . esc_url($script_url) . '"></script>' . PHP_EOL;
    }
}
add_action('wp_footer', 'tinylytics_output_script');


// *** Sanitization methods
function tinylytics_sanitize_text_input($input) {
    return sanitize_text_field($input);
}
function tinylytics_sanitize_checkbox($input) {
    return absint($input);
}


// *** Enqueue user scripts
add_action( 'admin_print_styles', 'tinylytics_user_scripts' );
function tinylytics_user_scripts() {
	$plugin_url = plugin_dir_url( __FILE__ );
	wp_enqueue_style( 'style',  $plugin_url . "/css/style.css");
}


// *** Wordpress shortcodes to use in posts and pages
function tinylytics_kudos_function() {
	$kudos = get_option('tinylytics_kudos', 0);
	if ($kudos === '1') {
		return '<button class="tinylytics_kudos" data-path="'. wp_make_link_relative(get_permalink()) .'"></button>';
	}
}
add_shortcode('tinykudos','tinylytics_kudos_function');

function tinylytics_hits_function() {
	$hits = get_option('tinylytics_hits', 0);
	if ($hits === '1') {
		return '<span class="tinylytics_hits" data-path="'. wp_make_link_relative(get_permalink()) .'"></span>';
	}
}
add_shortcode('tinyhits','tinylytics_hits_function');

function tinylytics_flags_function() {
	$flags = get_option('tinylytics_flags', 0);
	if ($flags === '1') {
		return '<p><span class="tinylytics_countries"></span></p>';
	}
}
add_shortcode('tinyflags','tinylytics_flags_function');

function tinylytics_webring_function() {
	$webring = get_option('tinylytics_webring', 0);
	$webring_label = get_option('tinylytics_webring_label');
	$avatars = get_option('tinylytics_avatars', 0);
	if ($webring === '1') {
		$show_avatar = $avatars ? '<img class="tinylytics_webring_avatar" src="" style="display: none"/>' : '';
		if ($webring_label === '') {
			$output = '<span class="tiny_webring"><a href="" class="tinylytics_webring" target="_blank" title="Tinylytics Web Ring">🕸️' . $show_avatar . '💍</a></span>';
		} else {
			$output = '<span class="tiny_webring"><a href="" class="tinylytics_webring" target="_blank" title="Tinylytics Web Ring">'. $show_avatar . $webring_label . '</a></span>';
		}
	}
	return $output;
}
add_shortcode('tinywebring','tinylytics_webring_function');


 // *** Display alerts after submitting custom admin wp form
 function tinylytics_admin_message($message, $msg_type) {
    return "<div id='message' class='notice notice-$msg_type is-dismissible'><p>$message</p></div>";
}

// *** Console logging
function log_to_browser_console($message) {
    echo '<script>console.log("' . addslashes($message) . '");</script>';
}
?>
