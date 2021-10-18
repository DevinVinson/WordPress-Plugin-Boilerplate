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
		'placeholder' => 'Text',
		'input_type'  => 'text'
	],
	'size'     => [
		'placeholder' => 'Font Size',
		'input_type'  => 'text'
	],
	'weight'   => [
		'placeholder' => 'Font Weight',
		'input_type'  => 'text'
	],
	'color'    => [
		'title'      => 'Colour',
		'input_type' => 'color'
	],
	'family'   => [
		'title'          => 'Font Family',
		'input_type'     => 'select',
		'select_options' => [
			'arial' => 'Arial',
		],
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
	'class'    => [
		'placeholder' => 'CSS Class(es)',
		'input_type'  => 'text'
	]
];
$dynamic_group_inputs = [
	'text'   => [
		'title'      => 'Dynamic Value',
		'input_type' => 'disabled',
	],
	'size'     => [
		'placeholder' => 'Font Size',
		'input_type'  => 'text'
	],
	'weight'   => [
		'placeholder' => 'Font Weight',
		'input_type'  => 'text'
	],
	'color'    => [
		'title'      => 'Colour',
		'input_type' => 'color',
	],
	'family'   => [
		'title'          => 'Font Family',
		'input_type'     => 'select',
		'select_options' => [
			'arial' => 'Arial',
		]
	],
	'position' => [
		'title'          => 'Text Position',
		'input_type'     => 'select',
		'select_options' => [
			'left'   => 'Left',
			'center' => 'Center',
			'right'  => 'Right',
		]
	],
	'class'    => [
		'placeholder' => 'CSS Class(es)',
		'input_type'  => 'text'
	]
];

/*
 * Define Meta Box Fields
 */
$progress_bar_metas = [
    'Bar Styling' => [
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
			    'class'            => [
				    'placeholder' => 'CSS Class(es)',
				    'input_type'  => 'text',
			    ]
		    ]
	    ],
	    'bar_value' => [
		    'title'  => 'Bar Text',
		    'inputs' => $dynamic_group_inputs,
	    ],
	    'bar_title' => [
		    'title'  => 'Title (Optional)',
		    'inputs' => $text_group_inputs
	    ],
	    'bar_block' => [
		    'title'  => 'Positioning/Block',
		    'inputs' => [
			    'background_color' => [
				    'title'      => 'Block Colour',
				    'input_type' => 'color'
			    ],
			    'width'            => [
				    'placeholder' => 'Bar Width',
				    'input_type'  => 'text',
			    ],
			    'height'           => [
				    'placeholder' => 'Bar Height',
				    'input_type'  => 'text',
			    ],
			    'position'         => [
				    'title'          => 'Bar Position',
				    'input_type'     => 'select',
				    'select_options' => [
					    'left'   => 'Left',
					    'center' => 'Center',
					    'right'  => 'Right',
				    ]
			    ],
			    'class'            => [
				    'placeholder' => 'Block CSS Class(es)',
				    'input_type'  => 'text'
			    ],
		    ]
	    ],
    ],
    'Progress Text' => [
	    'progress_text'  => [
		    'title'  => 'Title',
		    'inputs' => $text_group_inputs
	    ],
	    'progress_value' => [
		    'title'  => 'Value',
		    'inputs' => $dynamic_group_inputs
	    ],
    ],
    'Target Text' => [
	    'progress_text'  => [
		    'title'  => 'Title',
		    'inputs' => $text_group_inputs,
	    ],
	    'progress_value' => [
		    'title'  => 'Value',
		    'inputs' => $dynamic_group_inputs,
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
					    $input_key = "{$section_key}_{$input_key}";
					    if ($input_config['input_type'] !== 'disabled') {
						    $value = get_post_meta( $post->ID, "_{$input_key}", true );
					    }

					    display_meta_input(
						    $input_key,
						    $value,
						    $input_config['input_type'],
						    $input_config['title'] ?? '',
						    $input_config['placeholder'] ?? '',
						    $input_config['input_type'] === 'select' ? $input_config['select_options'] : []
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
 */
function display_meta_input(
	string $key,
	string $value,
	string $type,
	string $title = '',
	string $placeholder = '',
	array $options = []
): void {
	?>
    <div class="input_field">
		<?php if ( $type === 'text' || $type === 'color' ) { ?>
            <input name="<?= $key ?>" id="<?= $key ?>" type="<?= $type ?>"
                   value="<?= $value ?>" <?= $placeholder ? "placeholder=\"$placeholder\"" : '' ?>>
			<?php if ( $title ) { ?>
                <label for="<?= $key ?>"><?= $title ?></label>
            <?php }
		} elseif ( $type === 'select' ) { ?>
            <select name="<?= $key ?>" id="<?= $key ?>">
				<?php foreach ( $options as $option_value => $option_title ) { ?>
                    <option value="<?= $option_value ?>"<?= $value === $option_value ? 'selected' : '' ?>><?= $option_title ?></option>
                <?php } ?>
            </select>
			<?php if ( $title ) { ?>
                <label for="<?= $key ?>"><?= $title ?></label>
            <?php }
		} elseif ($type === 'disabled') {?>
            <input type="text" name="<?= $key ?>" id="<?= $key ?>" value="<?= $title ?>" disabled>
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
