<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Plugin_Name
 *
 * @wordpress-plugin
 * Plugin Name:       SU-QLD Salesforce Campaign Progress
 * Plugin URI:        https://r6digital.com.au/
 * Description:       Provides page elements that integrate with Salesforce to provide updating progress bars.
 * Version:           1.0.0
 * Author:            R6 Digital
 * Author URI:        https://r6digital.com.au/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       suqld-campaign-progress
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('SUQLD_CAMPAIGN_PROGRESS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-suqld-campaign-progress-activator.php
 */
function activate_plugin_name() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-suqld-campaign-progress-activator.php';
	Plugin_Name_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-suqld-campaign-progress-deactivator.php
 */
function deactivate_plugin_name() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-suqld-campaign-progress-deactivator.php';
	Plugin_Name_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_plugin_name' );
register_deactivation_hook( __FILE__, 'deactivate_plugin_name' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-suqld-campaign-progress.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_plugin_name() {

	$plugin = new Plugin_Name();
	$plugin->run();

}
run_plugin_name();

function register_progress_bar() {
    register_post_type(
        'progress_bar',
        [
            'labels' => [
                'name' => __('Progress Bars'),
                'singular_name' => __('Progress Bar'),
            ],
            'public' => false,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_admin_bar' => 5,
            'supports' => [
                'title',
            ]
        ]
    );
}
add_action('init', 'register_progress_bar');

function register_progress_bar_meta_boxes() {

    add_meta_box(
    'bar_color',
        __('Bar Colour', 'suqld-campaign-progress'),
        'render_bar_meta_fields',
        'progress_bar'
    );
}
add_action('add_meta_boxes', 'register_progress_bar_meta_boxes');

function render_bar_meta_fields($post) {
    $meta_boxes = [
        'bar' => [
            'background_color' => [
                'title' => 'Bar Colour',
                'input' => [
                    'type' => 'color',
                ]
            ],
            'progress_color' => [
                'title' => 'Progress Colour',
                'input' => [
                    'type' => 'color',
                ]
            ],
            'complete_color' => [
                'title' => 'Complete Colour',
                'input' => [
                    'type' => 'color',
                ]
            ],
            'class' => [
                'title' => 'Progress Bar Class',
                'input' => [
                    'type' => 'text',
                ]
            ]
        ],
        'bar_text' => [
            'text' => [
                'title' => 'Bar Text',
                'input' => [
                    'type' => 'text',
                ]
            ],
            'color' => [
                'title' => 'Text Colour',
                'input' => [
                    'type' => 'color',
                ]
            ],
            'size' => [
                'title' => 'Text Size',
                'input' => [
                    'type' => 'text',
                ]
            ],
            'position' => [
                'title' => 'Text Position',
                'input' => [
                    'type' => 'select',
                    'options' => [
                        'left' => 'Left',
                        'center' => 'Center',
                        'right' => 'Right',
                    ]
                ]
            ],
            'weight' => [
                'title' => 'Text Weight',
                'input' => [
                    'type' => 'text',
                ]
            ],
            'family' => [
                'title' => 'Text Family',
                'input' => [
                    'type' => 'select',
                    'options' => [
                        'arial' => 'Arial',
                    ]
                ]
            ],
            'class' => [
                'title' => 'Bar Text Class',
                'input' => [
                    'type' => 'text',
                ]
            ]
        ],
        'bar_value' => [
            'color' => [
                'title' => 'Text Colour',
                'input' => [
                    'type' => 'color',
                ]
            ],
            'size' => [
                'title' => 'Text Size',
                'input' => [
                    'type' => 'text',
                ]
            ],
            'position' => [
                'title' => 'Text Position',
                'input' => [
                    'type' => 'select',
                    'options' => [
                        'left' => 'Left',
                        'center' => 'Center',
                        'right' => 'Right',
                    ]
                ]
            ],
            'weight' => [
                'title' => 'Text Weight',
                'input' => [
                    'type' => 'text',
                ]
            ],
            'family' => [
                'title' => 'Text Family',
                'input' => [
                    'type' => 'select',
                    'options' => [
                        'arial' => 'Arial',
                    ]
                ]
            ],
            'class' => [
                'title' => 'Bar Text Class',
                'input' => [
                    'type' => 'text',
                ]
            ]
        ],
    ];

    $value = get_post_meta($post->ID, '_bar_color', true);
    ?>
    <label for="bar_color">Bar Colour</label>
    <input name="bar_color" id="bar_color" type="color" value="<?= $value ?>">
    <?php
}

function save_bar_meta_fields($post_id) {
    if(array_key_exists('bar_color', $_POST)) {
        update_post_meta(
            $post_id,
            '_bar_color',
            $_POST['bar_color']
        );
    }
}
add_action('save_post', 'save_bar_meta_fields');