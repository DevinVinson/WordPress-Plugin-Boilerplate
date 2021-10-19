<?php

require_once(plugin_dir_path(__FILE__).'/public/classes/ProgressBar.php');

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
define( 'SUQLD_CAMPAIGN_PROGRESS_VERSION', '1.0.0' );

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
 * Define repeat field groups
 */
$text_group_inputs = [
	'text'     => [
		'title' => 'Text',
		'input_type'  => 'text'
	],
	'font_size'     => [
		'title' => 'Font Size',
		'input_type'  => 'text',
        'input_unit' => 'px'
	],
	'font_weight'   => [
		'title' => 'Font Weight',
		'input_type'  => 'select',
		'select_options' => [
			'400'   => 'Normal',
			'700' => 'Bold',
		]
	],
	'color'    => [
		'title'      => 'Colour',
		'input_type' => 'color'
	],
	'font_family'   => [
		'title'          => 'Font Family',
		'input_type'     => 'text',
	],
	'position' => [
		'title'          => 'Position',
		'input_type'     => 'select',
		'select_options' => [
			'left'   => 'Left',
			'center' => 'Center',
			'right'  => 'Right',
		]
	],
	'css_classes'    => [
		'title' => 'CSS Classes',
		'input_type'  => 'text'
	]
];

/*
 * Define Meta Box Fields
 */
$progress_bar_metas = [
    'Progress Bar' => [
	    'bar'       => [
		    'title'  => 'Bar Styling',
		    'inputs' => [
			    'background_color' => [
				    'title'      => 'Bar',
				    'input_type' => 'color',
			    ],
			    'progress_color'   => [
				    'title'      => 'Progress',
				    'input_type' => 'color',
			    ],
			    'complete_color'   => [
				    'title'      => 'Complete',
				    'input_type' => 'color',
			    ],
			    'css_classes'            => [
				    'title' => 'CSS Classes',
				    'input_type'  => 'text',
			    ]
		    ]
	    ],
	    'bar_value' => [
		    'title'  => 'Bar Value',
		    'inputs' => [
			    'text'   => [
				    'title'      => 'Text',
				    'placeholder' => 'Dynamic',
				    'input_type' => 'disabled',
			    ],
			    'font_size'     => [
				    'title' => 'Font Size',
				    'input_type'  => 'text',
				    'input_unit' => 'px',
			    ],
			    'font_weight'   => [
				    'title' => 'Font Weight',
				    'input_type'  => 'select',
				    'select_options' => [
					    '400'   => 'Normal',
					    '700' => 'Bold',
				    ]
			    ],
			    'color'    => [
				    'title'      => 'Colour',
				    'input_type' => 'color',
			    ],
			    'font_family'   => [
				    'title'          => 'Font Family',
				    'input_type'     => 'text',
			    ],
			    'position' => [
				    'title'          => 'Position',
				    'input_type'     => 'select',
				    'select_options' => [
					    'center' => 'Center',
					    'left'   => 'Left',
					    'right'  => 'Right',
				    ]
			    ],
			    'css_classes'    => [
				    'title' => 'CSS Classes',
				    'input_type'  => 'text'
			    ]
		    ],
	    ],
	    'bar_title' => [
		    'title'  => 'Display Title (Opt.)',
		    'inputs' => $text_group_inputs
	    ],
	    'bar_block' => [
		    'title'  => 'Positioning/Block',
		    'inputs' => [
			    'height'           => [
				    'title' => 'Bar Height',
				    'input_type'  => 'text',
                    'input_unit' => 'px',
			    ],
			    'position' => [
				    'title'          => 'Block Position',
				    'input_type'     => 'select',
				    'select_options' => [
					    'center' => 'Center',
					    'left'   => 'Left',
					    'right'  => 'Right',
				    ]
			    ],
			    'width'            => [
				    'title' => 'Block Width',
				    'input_type'  => 'text',
                    'input_unit' => '%'
			    ],
                'background_color' => [
				    'title'      => 'Block Colour',
				    'input_type' => 'color'
			    ],
			    'css_classes'            => [
				    'title' => 'CSS Classes',
				    'input_type'  => 'text'
			    ],
		    ]
	    ],
    ],
    'Progress Text' => [
	    'progress_text'  => [
		    'title'  => 'Text',
		    'inputs' => $text_group_inputs
	    ],
	    'progress_value' => [
		    'title'  => 'Value',
		    'inputs' => [
			    'text'   => [
				    'title'      => 'Text',
				    'placeholder' => 'Dynamic',
				    'input_type' => 'disabled',
			    ],
			    'font_size'     => [
				    'title' => 'Font Size',
				    'input_type'  => 'text',
                    'input_unit' => 'px',
			    ],
			    'font_weight'   => [
				    'title' => 'Font Weight',
				    'input_type'  => 'select',
				    'select_options' => [
					    '400'   => 'Normal',
					    '700' => 'Bold',
				    ]
			    ],
			    'color'    => [
				    'title'      => 'Colour',
				    'input_type' => 'color',
			    ],
			    'font_family'   => [
				    'title'          => 'Font Family',
				    'input_type'     => 'select',
				    'select_options' => [
					    'arial' => 'Arial',
				    ]
			    ],
			    'css_classes'    => [
				    'title' => 'CSS Classes',
				    'input_type'  => 'text'
			    ]
		    ]
	    ],
    ],
    'Target Text' => [
	    'target_text'  => [
		    'title'  => 'Text',
		    'inputs' => $text_group_inputs,
	    ],
	    'target_value' => [
		    'title'  => 'Value',
		    'inputs' => [
			    'text'   => [
				    'title'      => 'Text',
				    'placeholder' => 'Dynamic',
				    'input_type' => 'disabled',
			    ],
			    'font_size'     => [
				    'title' => 'Font Size',
				    'input_type'  => 'text',
                    'input_unit' => 'px',
			    ],
			    'font_weight'   => [
				    'title' => 'Font Weight',
				    'input_type'  => 'select',
				    'select_options' => [
					    '400'   => 'Normal',
					    '700' => 'Bold',
				    ]
			    ],
			    'color'    => [
				    'title'      => 'Colour',
				    'input_type' => 'color',
			    ],
			    'font_family'   => [
				    'title'          => 'Font Family',
				    'input_type'     => 'select',
				    'select_options' => [
					    'arial' => 'Arial',
				    ]
			    ],
			    'css_classes'    => [
				    'title' => 'CSS Classes',
				    'input_type'  => 'text'
			    ]
		    ],
	    ],
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
			'labels'             => [
				'name'          => __( 'Progress Bars' ),
				'singular_name' => __( 'Progress Bar' ),
			],
			'public'             => false,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_admin_bar'  => 5,
			'supports'           => [
				'title',
			]
		]
	);
}

add_action( 'init', 'register_progress_bar' );

function register_progress_bar_meta() {
	add_meta_box(
		'bar_meta',
		__( 'Bar Settings', 'suqld-campaign-progress' ),
		'render_progress_bar_meta',
		'progress_bar'
	);
}
add_action( 'add_meta_boxes', 'register_progress_bar_meta' );

function render_progress_bar_meta( $post ) {
    global $progress_bar_metas;

    foreach ($progress_bar_metas as $meta_group_label => $meta_groups) { ?>
        <div class="input_group_title">
            <h1><?= $meta_group_label ?></h1>
        </div>
        <div class="input_group">
		    <?php foreach ( $meta_groups as $section_key => $meta_section ) { ?>
                <div id="<?= $section_key ?>" class="input_column">
                    <h3><?= $meta_section['title'] ?? 'placeholder' ?></h3>
				    <?php foreach ( $meta_section['inputs'] as $input_key => $input_config ) {
					    $input_meta = "{$section_key}_{$input_key}";
					    if ($input_config['input_type'] !== 'disabled') {
						    $value = get_post_meta( $post->ID, "_{$input_meta}", true );
					    }

					    display_meta_input(
						    $input_meta,
						    $value,
						    $input_config['input_type'],
						    $input_config['title'] ?? '',
						    $input_config['placeholder'] ?? '',
						    $input_config['input_type'] === 'select' ? $input_config['select_options'] : [],
						    $input_key,
						    $input_config['input_unit'] ?? ''
					    );
				    } ?>
                </div>
            <?php } ?>
        </div>
    <?php }
}

/**
 * Assemble and display HTML defined by passed parameters
 *
 * @param string $key
 * @param string $value
 * @param string $type
 * @param string $title
 * @param string $placeholder
 * @param array $options
 * @param string $input_classes
 */
function display_meta_input(
	string $key,
	string $value,
	string $type,
	string $title = '',
	string $placeholder = '',
	array $options = [],
    string $input_classes = '',
    string $unit = ''
): void {
	?>
    <div class="input_row">
		<?php if ( $type === 'text' || $type === 'color' ) { ?>
			<?php if ( $title ) { ?>
                <label for="<?= $key ?>"><?= $title ?></label>
			<?php } ?>
            <div class="input_field <?= $input_classes ?> <?= $unit ? "has_input_unit" : "" ?>">
                <input
                        name="<?= $key ?>"
                        id="<?= $key ?>" type="<?= $type ?>"
                        value="<?= $value ?>"
                    <?= $placeholder ? "placeholder=\"$placeholder\"" : '' ?>
                >
                <?php if ($unit) { ?>
                    <div class="input_unit"><?= $unit ?></div>
                <?php } ?>
            </div>
		<?php } elseif ( $type === 'select' ) { ?>
			<?php if ( $title ) { ?>
                <label for="<?= $key ?>"><?= $title ?></label>
			<?php } ?>
            <select name="<?= $key ?>" id="<?= $key ?>" class="<?= $input_classes ?>">
				<?php foreach ( $options as $option_value => $option_title ) { ?>
                    <option value="<?= $option_value ?>"<?= $value === $option_value ? 'selected' : '' ?>><?= $option_title ?></option>
                <?php } ?>
            </select>
		<?php } elseif ($type === 'disabled') {?>
			<?php if ( $title ) { ?>
                <label for="<?= $key ?>"><?= $title ?></label>
			<?php } ?>
            <input type="text" name="<?= $key ?>" id="<?= $key ?>" value="<?= $placeholder ?>" class="<?= $input_classes ?>" disabled>
        <?php } ?>
    </div>
	<?php
}

function save_bar_meta( $post_id ) {
	global $progress_bar_metas;

	foreach ($progress_bar_metas as $meta_groups) {
		foreach ( $meta_groups as $section_key => $meta_section ) {
			foreach ( $meta_section['inputs'] as $input_key => $input_config ) {
				if ($input_config['input_type'] === 'disabled') {
					continue;
				}

				$input_key = "{$section_key}_{$input_key}";
				$meta_key  = "_$input_key";

				if ( array_key_exists( $input_key, $_POST ) ) {
					update_post_meta(
						$post_id,
						$meta_key,
						$_POST[ $input_key ]
					);
				}
			}
		}
    }
}

add_action( 'save_post', 'save_bar_meta' );

function progress_bar_shortcode($shortcode_args = []) {
    $args = shortcode_atts(
        ['id' => null],
        $shortcode_args
    );

    /*
     * Return early if ID provided does not correspond to a valid Progress Bar
     */
    if (!isset($args['id']) || get_post_type($args['id']) !== "progress_bar") {
        return "<pre>The ID provided to this shortcode does not correspond to a valid Progress Bar post type ID.</pre>";
    }

    /*
     * Render the Progress Bar with provided helper functions
     */
	$progress_bar = new ProgressBar($args['id']);
    return $progress_bar->get_html();
}
add_shortcode('progress_bar', 'progress_bar_shortcode');