<?php

class ProgressBar extends stdClass {
	private $id;

	private $config = [
		'bar'            => [
			'background_color' => null,
			'progress_color'   => null,
			'complete_color'   => null,
			'css_classes'      => null,
		],
		'bar_value'      => [
			'text'        => null,
			'font_size'   => null,
			'font_weight' => null,
			'color'       => null,
			'font_family' => null,
			'position'    => null,
			'css_classes' => null,
		],
		'bar_title'      => [
			'text'        => null,
			'font_size'   => null,
			'font_weight' => null,
			'color'       => null,
			'font_family' => null,
			'position'    => null,
			'css_classes' => null,
		],
		'bar_block'      => [
			'width'            => null,
			'height'           => null,
			'position'         => null,
			'background_color' => null,
			'css_classes'      => null,
		],
		'progress_text'  => [
			'text'        => null,
			'font_size'   => null,
			'font_weight' => null,
			'color'       => null,
			'font_family' => null,
			'position'    => null,
			'css_classes' => null,
		],
		'progress_value' => [
			'text'        => null,
			'font_size'   => null,
			'font_weight' => null,
			'color'       => null,
			'font_family' => null,
			'position'    => null,
			'css_classes' => null,
		],
		'target_text'    => [
			'text'        => null,
			'font_size'   => null,
			'font_weight' => null,
			'color'       => null,
			'font_family' => null,
			'position'    => null,
			'css_classes' => null,
		],
		'target_value'   => [
			'text'        => null,
			'font_size'   => null,
			'font_weight' => null,
			'color'       => null,
			'font_family' => null,
			'position'    => null,
			'css_classes' => null,
		],
	];

	/**
	 * ProgressBar constructor. Responsible for loading settings from Meta.
	 *
	 * @param $id
	 */
	function __construct( $id ) {
		$this->id = $id;
		foreach ( $this->config as $input_group_key => $input_keys ) {
			foreach ( $input_keys as $input_key => $meta_value ) {
				$this->config[ $input_group_key ][ $input_key ] =
					get_post_meta( $id,
					               "_{$input_group_key}_{$input_key}",
					               true
					);
			}
		}
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
	 * Get the properties set for the Progress Bar.
	 *
	 * @return array[][]
	 */
	function get_config(): array {
		return $this->config;
	}

	/**
	 * Get the HTML to be used to display the Progress Bar.
	 *
	 * @return string The HTML to be displayed.
	 */
	function get_html(): string {
		$id     = $this->get_id();
		$config = $this->get_config();

		return <<<HTML
<div class="progress-bar__shortcode">
    {$this->get_style_element()}
    <div id="progress_bar_$id" class="bar_$id progress-bar__wrapper {$config['bar_block']['css_classes']}">
        <div class="progress-bar__title {$config['bar_title']['css_classes']}">{$config['bar_title']['text']}</div>
        <div class="progress-bar__bar {$config['bar']['css_classes']}">
            <div class="progress-bar__bar-progress">
            </div>
            <div class="progress-bar__value {$config['bar_value']['css_classes']}">
                <span>$ 267,150.00</span>
            </div>
        </div>
        <div class="progress-bar__sub-text">
            <div class="progress-bar__progress-title">
                <span class="progress-bar__progress-title__text {$config['progress_text']['css_classes']}">{$config['progress_text']['text']}</span>
                <span class="progress-bar__progress-title__separator">&nbsp</span>
                <span class="progress-bar__progress-title__value {$config['progress_value']['css_classes']}">66%</span>
            </div>
            <div class="progress-bar__target-title">
                <span class="progress-bar__target-title__text {$config['target_text']['css_classes']}">{$config['target_text']['text']}</span>
                <span class="progress-bar__target-title__separator">&nbsp</span>
                <span class="progress-bar__target-title__value {$config['target_value']['css_classes']}">$ 411,000.00</span>
            </div>
        </div>
    </div>
</div>
HTML;
	}

	/**
	 * Get the styling definitions to be used for the Progress Bar.
	 *
	 * @return string Stylesheet wrapped in <style></style> HTML elements.
	 */
	function get_style_element(): string {
		$id     = $this->get_id();
		$config = $this->config;

		/*
		 * Manually define structure of CSS to be rendered based on $config
		 */
		$style_definitions_sets = [
			".progress-bar__wrapper"                    => [
				$config['bar_block']['height'] ? "--bar_height: {$config['bar_block']['height']}px;" : null,
				$config['bar_block']['width'] ? "--block_width: {$config['bar_block']['width']}%;" : null,
				$config['bar_block']['background_color'] ? "background-color: #{$config['bar_block']['background_color']};" : null,
				$config['bar_block']['position'] === "left" ? "margin-right: auto; margin-left: 0;" : null,
				$config['bar_block']['position'] === "right" ? "margin-right: 0; margin-left: auto;" : null,
				$config['bar_block']['position'] === "center" ? "margin-right: auto; margin-left: auto;" : null,
			],
			" .progress-bar__bar"                       => [
				$config['bar']['background_color'] ? "background-color: #{$config['bar']['background_color']};" : null,
				$config['bar_value']['position'] ? "justify-content: {$config['bar_value']['position']};" : null,
			],
			" .progress-bar__bar-progress"              => [
				$config['bar']['progress_color'] ? "background-color: #{$config['bar']['progress_color']};" : null,
			],
			" .progress-bar__bar-progress.complete"     => [
				$config['bar']['complete_color'] ? "background-color: #{$config['bar']['complete_color']};" : null,
			],
			" .progress-bar__value"                     => [
				$config['bar_value']['font_size'] ? "font-size: {$config['bar_value']['font_size']};" : null,
				$config['bar_value']['font_weight'] ? "font-weight: {$config['bar_value']['font_weight']};" : null,
				$config['bar_value']['color'] ? "color: #{$config['bar_value']['color']};" : null,
				$config['bar_value']['font_family'] ? "font-family: {$config['bar_value']['font_family']};" : null,
			],
			" .progress-bar__title"                     => [
				$config['bar_title']['font_size'] ? "font-size: {$config['bar_title']['font_size']};" : null,
				$config['bar_title']['font_weight'] ? "font-weight: {$config['bar_title']['font_weight']};" : null,
				$config['bar_title']['color'] ? "color: #{$config['bar_title']['color']};" : null,
				$config['bar_title']['font_family'] ? "font-family: {$config['bar_title']['font_family']};" : null,
				$config['bar_title']['position'] === "left" ? "justify-content: start;" : null,
				$config['bar_title']['position'] === "right" ? "justify-content: end;" : null,
				$config['bar_title']['position'] === "center" ? "justify-content: center;" : null,
			],
			" .progress-bar__progress-title"            => [
				$config['progress_text']['position'] === "left" ? "flex-direction: row;" : null,
				$config['progress_text']['position'] === "right" ? "flex-direction: row-reverse;" : null,
				$config['progress_text']['position'] === "center" ? "flex-direction: column;" : null,
			],
			" .progress-bar__progress-title__separator" => [
				$config['progress_text']['position'] === "center" ? "display: none;" : null,
			],
			" .progress-bar__target-title"              => [
				$config['target_text']['position'] === "left" ? "flex-direction: row;" : null,
				$config['target_text']['position'] === "right" ? "flex-direction: row-reverse;" : null,
				$config['target_text']['position'] === "center" ? "flex-direction: column;" : null,
			],
			" .progress-bar__target-title__separator"   => [
				$config['target_text']['position'] === "center" ? "display: none;" : null,
			],
			" .progress-bar__progress-title__text"      => [
				$config['progress_text']['font_size'] ? "font-size: {$config['progress_text']['font_size']};" : null,
				$config['progress_text']['font_weight'] ? "font-weight: {$config['progress_text']['font_weight']};" : null,
				$config['progress_text']['color'] ? "color: #{$config['progress_text']['color']};" : null,
				$config['progress_text']['font_family'] ? "font-family: {$config['progress_text']['font_family']};" : null,
			],
			" .progress-bar__progress-value__text"      => [
				$config['progress_value']['font_size'] ? "font-size: {$config['progress_value']['font_size']};" : null,
				$config['progress_value']['font_weight'] ? "font-weight: {$config['progress_value']['font_weight']};" : null,
				$config['progress_value']['color'] ? "color: #{$config['progress_value']['color']};" : null,
				$config['progress_value']['font_family'] ? "font-family: {$config['progress_value']['font_family']};" : null,
			],
			" .progress-bar__target-title__text"        => [
				$config['target_text']['font_size'] ? "font-size: {$config['target_text']['font_size']};" : null,
				$config['target_text']['font_weight'] ? "font-weight: {$config['target_text']['font_weight']};" : null,
				$config['target_text']['color'] ? "color: #{$config['target_text']['color']};" : null,
				$config['target_text']['font_family'] ? "font-family: {$config['target_text']['font_family']};" : null,
			],
			" .progress-bar__target-value__text"        => [
				$config['target_value']['font_size'] ? "font-size: {$config['target_value']['font_size']};" : null,
				$config['target_value']['font_weight'] ? "font-weight: {$config['target_value']['font_weight']};" : null,
				$config['target_value']['color'] ? "color: #{$config['target_value']['color']};" : null,
				$config['target_value']['font_family'] ? "font-family: {$config['target_value']['font_family']};" : null,
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
}