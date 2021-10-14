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

/*
 * Define Meta Box Fields
 */
$bar_metas = [
    'bar' => [
        'title' => 'Bar Styling',
        'inputs' => [
            'background_color' => [
                'title' => 'Bar Colour',
                'input_type' => 'color',
            ],
            'progress_color' => [
                'title' => 'Progress Colour',
                'input_type' => 'color',
            ],
            'complete_color' => [
                'title' => 'Complete Colour',
                'input_type' => 'color',
            ],
            'class' => [
                'title' => 'Progress Bar Class',
                'input_type' => 'text',
            ]
        ]
    ],
    'bar_value' => [
	    'title' => 'Value Styling',
	    'inputs' => [
        'color' => [
            'title' => 'Text Colour',
            'input_type' => 'color',
        ],
        'size' => [
            'title' => 'Text Size',
            'input_type' => 'text'
        ],
        'position' => [
            'title' => 'Text Position',
            'input_type' => 'select',
            'select_options' => [
                'left' => 'Left',
                'center' => 'Center',
                'right' => 'Right',
            ]
        ],
        'weight' => [
            'title' => 'Text Weight',
            'input_type' => 'text'
        ],
        'family' => [
            'title' => 'Text Family',
            'input_type' => 'select',
            'select_options' => [
                'arial' => 'Arial',
            ]
        ],
        'class' => [
            'title' => 'Bar Text Class',
            'input_type' => 'text'
        ]
    ]
    ],
    'bar_title' => [
	    'title' => 'Title Styling',
	    'inputs' => [
        'text' => [
            'title' => 'Title Text',
            'input_type' => 'text'
        ],
        'color' => [
            'title' => 'Title Colour',
            'input_type' => 'color'
        ],
        'size' => [
            'title' => 'Title Size',
            'input_type' => 'text'
        ],
        'position' => [
            'title' => 'Title Position',
            'input_type' => 'select',
            'select_options' => [
                'left' => 'Left',
                'center' => 'Center',
                'right' => 'Right',
            ]
        ],
        'weight' => [
            'title' => 'Title Weight',
            'input_type' => 'text'
        ],
        'family' => [
            'title' => 'Title Family',
            'input_type' => 'select',
            'select_options' => [
                'arial' => 'Arial',
            ],
        ],
        'class' => [
            'title' => 'Bar Text Class',
            'input_type' => 'text'
        ]
    ]
    ],
    'bar_block' => [
	    'title' => 'Box Styling/Positioning',
	    'inputs' => [
        'background_color' => [
            'title' => 'Wrapper Colour',
            'input_type' => 'color'
        ],
        'class' => [
            'title' => 'Wrapper Class',
            'input_type' => 'text'
        ],
        'width' => [
            'title' => 'Bar Width',
            'input_type' => 'text',
        ],
        'height' => [
            'title' => 'Bar Height',
            'input_type' => 'text',
        ],
        'position' => [
            'title' => 'Bar Position',
            'input_type' => 'select',
            'select_options' => [
                'left' => 'Left',
                'center' => 'Center',
                'right' => 'Right',
            ]
        ],
    ]
    ],
];

/*
 * Register custom post type and relevant meta boxes
 * These act as the bar interface
 */
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
    'bar_meta',
        __('Bar Settings', 'suqld-campaign-progress'),
        'render_bar_meta',
        'progress_bar'
    );
}
add_action('add_meta_boxes', 'register_progress_bar_meta_boxes');

function render_bar_meta($post) {
    global $bar_metas;
    foreach ($bar_metas as $section_key => $meta_section) {
        ?>
            <div id="<?= $section_key ?>">
                <h3><?= $meta_section['title'] ?? 'placeholder' ?></h3>
                <?php
                foreach ($meta_section['inputs'] as $input_key => $meta_input) {
                    $input_key = "{$section_key}_{$input_key}";

                    $value = get_post_meta($post->ID, "_{$input_key}", true);
                    display_meta_input(
                        $meta_input['title'],
                        $input_key,
                        $value,
                        $meta_input['input_type'],
                        $meta_input['input_type'] === 'select' ? $meta_input['select_options'] : []
                    );
                }
                ?>
            </div>
        <?php
    }
}

function display_meta_input(
        string $title,
        string $key,
        string $value,
        string $type,
        array $options = []
): void
{
    ?>
    <label for="<?= $key ?>"><?= $title ?></label>
    <?php
    if (
        $type === 'text'
        || $type === 'color'
    ) {
        ?>
        <input name="<?= $key ?>" id="<?= $key ?>" type="<?= $type ?>" value="<?= $value ?>">
        <?php
    } elseif ( $type === 'select') {
        ?>
        <select name="<?= $key ?>" id="<?= $key ?>">
            <?php
            foreach ($options as $option_value => $option_title) {
                ?>
                <option value="<?= $option_value ?>"<?= $value === $option_value ? 'selected' : '' ?>><?= $option_title ?></option>
                <?php
            }
            ?>
        </select>
        <?php
    }
}

function save_bar_meta ($post_id) {
    global $bar_metas;
    foreach ($bar_metas as $section_key => $meta_section) {
        $input_keys = array_keys($meta_section['inputs']);
        foreach ($input_keys as $input_key) {
            $input_key = "{$section_key}_{$input_key}";
            $meta_key = "_$input_key";

            if (array_key_exists($input_key, $_POST)) {
                update_post_meta(
                    $post_id,
                    $meta_key,
                    $_POST[$input_key]
                );
            }
        }
    }
}
add_action('save_post', 'save_bar_meta');