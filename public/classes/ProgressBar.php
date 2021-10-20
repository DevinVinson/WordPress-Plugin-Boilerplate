<?php

use Admin\Inputs;

class ProgressBar extends stdClass {
	private $id;

	private $input_structure;

	/**
	 * ProgressBar constructor. Initialises all relevant input fields using the provided post ID.
	 *
	 * @param string $id The Progress bar's ID (Should be provided from the corresponding Progress Bar custom post type).
	 */
	function __construct( string $id ) {
		$this->id = $id;
		
		$this->input_structure = [
			'Progress Bar'  => [
				'bar'       => [
					'title'  => 'Bar Styling',
					'inputs' => [
						new Inputs\ColorField(
							$this->id,
							'bar_background_color',
							'Bar Colour'
						),
						new Inputs\ColorField(
							$this->id,
							'bar_progress_color',
							'Progress Colour'
						),
						new Inputs\ColorField(
							$this->id,
							'bar_complete_color',
							'Complete Colour'
						),
						new Inputs\TextField(
							$this->id,
							'bar_css_classes',
							'CSS Classes',
							['css_classes']
						),
					]
				],
				'bar_value' => [
					'title'  => 'Bar Value',
					'inputs' => [
						new Inputs\DisabledField(
							$this->id,
							'bar_value_text',
							'Text',
							'Dynamic',
							['label']
						),
						new Inputs\UnitField(
							$this->id,
							'bar_value_font_size',
							'Font Size',
							'px'
						),
						new Inputs\SelectField(
							$this->id,
							'bar_value_font_weight',
							'Font Weight',
							[
								'400' => 'Normal',
								'700' => 'Bold',
							]
						),
						new Inputs\ColorField(
							$this->id,
							'bar_value_color',
							'Colour'
						),
						new Inputs\TextField(
							$this->id,
							'bar_value_font_family',
							'Font Family'
						),
						new Inputs\SelectField(
							$this->id,
							'bar_value_position',
							'Position',
							[
								'center' => 'Center',
								'left'   => 'Left',
								'right'  => 'Right',
							]
						),
						new Inputs\TextField(
							$this->id,
							'bar_value_css_classes',
							'CSS Classes',
							['css_classes']
						),
					],
				],
				'bar_title' => [
					'title'  => 'Display Title (Opt.)',
					'inputs' => [
						new Inputs\TextField(
							$this->id,
							'bar_title_text',
							'Text',
							['label']
						),
						new Inputs\UnitField(
							$this->id,
							'bar_title_font_size',
							'Font Size',
							'px'
						),
						new Inputs\SelectField(
							$this->id,
							'bar_title_font_weight',
							'Font Weight',
							[
								'400' => 'Normal',
								'700' => 'Bold',
							]
						),
						new Inputs\ColorField(
							$this->id,
							'bar_title_color',
							'Colour'
						),
						new Inputs\TextField(
							$this->id,
							'bar_title_font_family',
							'Font Family'
						),
						new Inputs\SelectField(
							$this->id,
							'bar_title_position',
							'Position',
							[
								'center' => 'Center',
								'left'   => 'Left',
								'right'  => 'Right',
							]
						),
						new Inputs\TextField(
							$this->id,
							'bar_title_css_classes',
							'CSS Classes',
							['css_classes']
						),
					],
				],
				'bar_block' => [
					'title'  => 'Positioning/Block',
					'inputs' => [
						new Inputs\UnitField(
							$this->id,
							'bar_block_height',
							'Bar Height',
							'px'
						),
						new Inputs\SelectField(
							$this->id,
							'bar_block_position',
							'Block Position',
							[
								'center' => 'Center',
								'left'   => 'Left',
								'right'  => 'Right',
							]
						),
						new Inputs\UnitField(
							$this->id,
							'bar_block_width',
							'Bar Width',
							'%'
						),
						new Inputs\ColorField(
							$this->id,
							'bar_value_background_color',
							'Block Colour'
						),
						new Inputs\TextField(
							$this->id,
							'bar_block_classes',
							'CSS Classes',
							['css_classes']
						),
					]
				],
			],
			'Progress' => [
				'progress_text'  => [
					'title'  => 'Text',
					'inputs' => [
						new Inputs\TextField(
							$this->id,
							'progress_text_text',
							'Text',
							['label']
						),
						new Inputs\UnitField(
							$this->id,
							'progress_text_font_size',
							'Font Size',
							'px'
						),
						new Inputs\SelectField(
							$this->id,
							'progress_text_font_weight',
							'Font Weight',
							[
								'400' => 'Normal',
								'700' => 'Bold',
							]
						),
						new Inputs\ColorField(
							$this->id,
							'progress_text_color',
							'Colour'
						),
						new Inputs\TextField(
							$this->id,
							'progress_text_font_family',
							'Font Family'
						),
						new Inputs\SelectField(
							$this->id,
							'progress_text_position',
							'Position',
							[
								'center' => 'Center',
								'left'   => 'Left',
								'right'  => 'Right',
							]
						),
						new Inputs\TextField(
							$this->id,
							'progress_text_css_classes',
							'CSS Classes',
							['css_classes']
						),
					],
				],
				'progress_value' => [
					'title'  => 'Value',
					'inputs' => [
						new Inputs\TextField(
							$this->id,
							'progress_value_text',
							'Text',
							['label']
						),
						new Inputs\UnitField(
							$this->id,
							'progress_value_font_size',
							'Font Size',
							'px'
						),
						new Inputs\SelectField(
							$this->id,
							'progress_value_font_weight',
							'Font Weight',
							[
								'400' => 'Normal',
								'700' => 'Bold',
							]
						),
						new Inputs\ColorField(
							$this->id,
							'progress_value_color',
							'Colour'
						),
						new Inputs\TextField(
							$this->id,
							'progress_value_font_family',
							'Font Family'
						),
						new Inputs\TextField(
							$this->id,
							'progress_value_css_classes',
							'CSS Classes',
							['css_classes']
						),
					],
				],
			],
			'Target'   => [
				'target_text'  => [
					'title'  => 'Text',
					'inputs' => [
						new Inputs\TextField(
							$this->id,
							'target_text_text',
							'Text',
							['label']
						),
						new Inputs\UnitField(
							$this->id,
							'target_text_font_size',
							'Font Size',
							'px'
						),
						new Inputs\SelectField(
							$this->id,
							'target_text_font_weight',
							'Font Weight',
							[
								'400' => 'Normal',
								'700' => 'Bold',
							]
						),
						new Inputs\ColorField(
							$this->id,
							'target_text_color',
							'Colour'
						),
						new Inputs\TextField(
							$this->id,
							'target_text_font_family',
							'Font Family'
						),
						new Inputs\SelectField(
							$this->id,
							'target_text_position',
							'Position',
							[
								'center' => 'Center',
								'left'   => 'Left',
								'right'  => 'Right',
							]
						),
						new Inputs\TextField(
							$this->id,
							'target_text_css_classes',
							'CSS Classes',
							['css_classes']
						),
					],
				],
				'target_value' => [
					'title'  => 'Value',
					'inputs' => [
						new Inputs\TextField(
							$this->id,
							'target_value_text',
							'Text',
							['label']
						),
						new Inputs\UnitField(
							$this->id,
							'target_value_font_size',
							'Font Size',
							'px'
						),
						new Inputs\SelectField(
							$this->id,
							'target_value_font_weight',
							'Font Weight',
							[
								'400' => 'Normal',
								'700' => 'Bold',
							]
						),
						new Inputs\ColorField(
							$this->id,
							'target_value_color',
							'Colour'
						),
						new Inputs\TextField(
							$this->id,
							'target_value_font_family',
							'Font Family'
						),
						new Inputs\TextField(
							$this->id,
							'target_value_css_classes',
							'CSS Classes',
							['css_classes']
						),
					],
				],
			],
		];
	}

	/**
	 * Returns the ID currently specified for the progress bar.
	 *
	 * @return int
	 */
	function get_id(): int {
		return $this->id;
	}

	/**
	 * Gets a single level array of all input objects used for this object.
	 *
	 * @return array The list of input objects used.
	 */
	private function get_input_objects(): array {
		$input_objects = [];
		foreach ($this->input_structure as $input_columns) {
			foreach ( $input_columns as $input_column ) {
				foreach ( $input_column['inputs'] as $input_object ) {
					$input_objects[] = $input_object;
				}
			}
		}
		return $input_objects;
	}

	/**
	 * Get the properties set for the Progress Bar.
	 *
	 * @return array[][]
	 */
	function get_config(): array {
		$config = [];
		foreach ($this->get_input_objects() as $input_object) {
			/* @var $input_object Inputs\InputField */
			$config[$input_object->get_input_key()] = $input_object->get_meta_value();
		}
		return $config;
	}

	/**
	 * Returns HTML to display Progress Bar input fields, prefilled with meta if the meta values exist.
	 *
	 * @return string The filled and formatted input fields, structured to be more presentable.
	 */
	function get_admin_html(): string {
		$html = "";
		foreach ( $this->input_structure as $meta_group_label => $input_columns ) {
			$html .= <<<HTML
<div class="input_group_title">
	<h1>$meta_group_label</h1>
</div>
<div class="input_group">
HTML;
				foreach ( $input_columns as $section_key => $input_column ) {
					$html .= <<<HTML
	<div id="$section_key" class="input_column">
		<h3>{$input_column['title']}</h3>
HTML;
						/*
						 * Prepare and render input rows.
						 */
						foreach ( $input_column['inputs'] as $input_object ) {
							$html .= <<<HTML
		{$input_object->get_html()}
HTML;
						}
						$html .= <<<HTML
	</div>
HTML;
				}
				$html .= <<<HTML
</div>
HTML;
		}

		return $html;
	}

	/**
	 * Saves inputs for the Progress Bar. Removes unused meta fields from the database.
	 *
	 * @return bool True if all fields update correctly. False if any fail.
	 */
	function save_meta(): bool {
		$success = true;

		foreach ( $this->get_input_objects() as $input_object ) {
			/* @var $input_object Inputs\InputField */

			$success = $input_object->save_field_value() && $success;
		}

		return $success;
	}

	/**
	 * Get the styling definitions to be used for the Progress Bar.
	 *
	 * @return string Stylesheet wrapped in <style></style> HTML elements.
	 */
	function get_public_style_element(): string {
		$id     = $this->post_id;
		$config = $this->get_config();

		/*
		 * Manually define structure of CSS to be rendered based on $config
		 */
		$style_definitions_sets = [
			".progress-bar__wrapper"                    => [
				$config['bar_block_height'] ? "--bar_height: {$config['bar_block_height']}px;" : null,
				$config['bar_block_width'] ? "--block_width: {$config['bar_block_width']}%;" : null,
				$config['bar_block_background_color'] ? "background-color: #{$config['bar_block_background_color']};" : null,
				$config['bar_block_position'] === "left" ? "margin-right: auto; margin-left: 0;" : null,
				$config['bar_block_position'] === "right" ? "margin-right: 0; margin-left: auto;" : null,
				$config['bar_block_position'] === "center" ? "margin-right: auto; margin-left: auto;" : null,
			],
			" .progress-bar__bar"                       => [
				$config['bar_background_color'] ? "background-color: #{$config['bar_background_color']};" : null,
				$config['bar_value_position'] ? "justify-content: {$config['bar_value_position']};" : null,
			],
			" .progress-bar__bar-progress"              => [
				$config['bar_progress_color'] ? "background-color: #{$config['bar_progress_color']};" : null,
			],
			" .progress-bar__bar-progress.complete"     => [
				$config['bar_complete_color'] ? "background-color: #{$config['bar_complete_color']};" : null,
			],
			" .progress-bar__value"                     => [
				$config['bar_value_font_size'] ? "font-size: {$config['bar_value_font_size']};" : null,
				$config['bar_value_font_weight'] ? "font-weight: {$config['bar_value_font_weight']};" : null,
				$config['bar_value_color'] ? "color: #{$config['bar_value_color']};" : null,
				$config['bar_value_font_family'] ? "font-family: {$config['bar_value_font_family']};" : null,
			],
			" .progress-bar__title"                     => [
				$config['bar_title_font_size'] ? "font-size: {$config['bar_title_font_size']};" : null,
				$config['bar_title_font_weight'] ? "font-weight: {$config['bar_title_font_weight']};" : null,
				$config['bar_title_color'] ? "color: #{$config['bar_title_color']};" : null,
				$config['bar_title_font_family'] ? "font-family: {$config['bar_title_font_family']};" : null,
				$config['bar_title_position'] === "left" ? "justify-content: start;" : null,
				$config['bar_title_position'] === "right" ? "justify-content: end;" : null,
				$config['bar_title_position'] === "center" ? "justify-content: center;" : null,
			],
			" .progress-bar__progress-title"            => [
				$config['progress_text_position'] === "left" ? "flex-direction: row;" : null,
				$config['progress_text_position'] === "right" ? "flex-direction: row-reverse;" : null,
				$config['progress_text_position'] === "center" ? "flex-direction: column;" : null,
			],
			" .progress-bar__progress-title__separator" => [
				$config['progress_text_position'] === "center" ? "display: none;" : null,
			],
			" .progress-bar__target-title"              => [
				$config['target_text_position'] === "left" ? "flex-direction: row;" : null,
				$config['target_text_position'] === "right" ? "flex-direction: row-reverse;" : null,
				$config['target_text_position'] === "center" ? "flex-direction: column;" : null,
			],
			" .progress-bar__target-title__separator"   => [
				$config['target_text_position'] === "center" ? "display: none;" : null,
			],
			" .progress-bar__progress-title__text"      => [
				$config['progress_text_font_size'] ? "font-size: {$config['progress_text_font_size']};" : null,
				$config['progress_text_font_weight'] ? "font-weight: {$config['progress_text_font_weight']};" : null,
				$config['progress_text_color'] ? "color: #{$config['progress_text_color']};" : null,
				$config['progress_text_font_family'] ? "font-family: {$config['progress_text_font_family']};" : null,
			],
			" .progress-bar__progress-value__text"      => [
				$config['progress_value_font_size'] ? "font-size: {$config['progress_value_font_size']};" : null,
				$config['progress_value_font_weight'] ? "font-weight: {$config['progress_value_font_weight']};" : null,
				$config['progress_value_color'] ? "color: #{$config['progress_value_color']};" : null,
				$config['progress_value_font_family'] ? "font-family: {$config['progress_value_font_family']};" : null,
			],
			" .progress-bar__target-title__text"        => [
				$config['target_text_font_size'] ? "font-size: {$config['target_text_font_size']};" : null,
				$config['target_text_font_weight'] ? "font-weight: {$config['target_text_font_weight']};" : null,
				$config['target_text_color'] ? "color: #{$config['target_text_color']};" : null,
				$config['target_text_font_family'] ? "font-family: {$config['target_text_font_family']};" : null,
			],
			" .progress-bar__target-value__text"        => [
				$config['target_value_font_size'] ? "font-size: {$config['target_value_font_size']};" : null,
				$config['target_value_font_weight'] ? "font-weight: {$config['target_value_font_weight']};" : null,
				$config['target_value_color'] ? "color: #{$config['target_value_color']};" : null,
				$config['target_value_font_family'] ? "font-family: {$config['target_value_font_family']};" : null,
			]
		];

		/*
		 * Concatenate array into CSS compliant string for rendering in HTML
		 */
		$stylesheet_string = '';
		foreach ( $style_definitions_sets as $style_selector => $style_definitions ) {
			$stylesheet_string .= ".bar_{$id}{$style_selector} {";
			foreach ( $style_definitions as $style_definition ) {
				$stylesheet_string .= $style_definition;
			}
			$stylesheet_string .= "}";
		}

		return "
    <style>
        $stylesheet_string
    </style>
    ";
	}

	/**
	 * Get the HTML to be used to display the Progress Bar.
	 *
	 * @return string The HTML to be displayed.
	 */
	function get_public_html(): string {
		$id     = $this->post_id;
		$config = $this->get_config();

		return <<<HTML
<div class="progress-bar__shortcode">
    {$this->get_public_style_element()}
    <div id="progress_bar_$id" class="bar_$id progress-bar__wrapper {$config['bar_block_css_classes']}">
        <div class="progress-bar__title {$config['bar_title_css_classes']}">{$config['bar_title_text']}</div>
        <div class="progress-bar__bar {$config['bar_css_classes']}">
            <div class="progress-bar__bar-progress">
            </div>
            <div class="progress-bar__value {$config['bar_value_css_classes']}">
                <span>$ 267,150.00</span>
            </div>
        </div>
        <div class="progress-bar__sub-text">
            <div class="progress-bar__progress-title">
                <span class="progress-bar__progress-title__text {$config['progress_text_css_classes']}">{$config['progress_text_text']}</span>
                <span class="progress-bar__progress-title__separator">&nbsp</span>
                <span class="progress-bar__progress-title__value {$config['progress_value_css_classes']}">66%</span>
            </div>
            <div class="progress-bar__target-title">
                <span class="progress-bar__target-title__text {$config['target_text_css_classes']}">{$config['target_text_text']}</span>
                <span class="progress-bar__target-title__separator">&nbsp</span>
                <span class="progress-bar__target-title__value {$config['target_value_css_classes']}">$ 411,000.00</span>
            </div>
        </div>
    </div>
</div>
HTML;
	}
}