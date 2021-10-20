<?php

namespace Admin\Inputs;

class SelectField extends InputField
{
    private $options;

	/**
	 * @param string $post_id
	 * @param string $input_key
	 * @param string $title
	 * @param array $options
	 * @param array $css_classes
	 */
    public function __construct(
        string $post_id,
        string $input_key,
        string $title,
        array $options,
        array $css_classes = []
    )
    {
        parent::__construct(
            $post_id,
            "text",
            $input_key,
            $title,
            $css_classes
        );

        $this->options = $options;
    }

	/**
	 * Renders the $value and $label to an <option></option> HTML element as a string.
	 *
	 * @param string $value The value that will be submitted when submitted and this option is selected.
	 * @param string $label The text that will be displayed, representing the value.
	 *
	 * @return string Formatted HTML as a string
	 */
	private function create_option_html(string $value, string $label): string {
        $selected = $value === $this->meta_value ? "selected" : null;
        return <<<HTML
<option value="$value" $selected>$label</option>
HTML;

    }

	/**
	 * Return a string of formatted <option></option> elements for use in this Input Object's <select></select> element.
	 *
	 * @return string Formatted HTML as a string
	 */
	private function get_options_html(): string {
        $options_html = "";
        foreach ($this->options as $value => $label) {
            $options_html .= $this->create_option_html($value, $label);
        }
        return $options_html;
    }

	/**
	 * Returns formatted HTML to be displayed in a WordPress post's meta box.
	 *
	 * @return string Formatted HTML
	 */
	public function get_html(): string {
        $field_classes = $this->concat_css_classes();
        $options_html = $this->get_options_html();

        return <<<HTML
<div class="input_row">
	<label for="$this->meta_key">$this->title</label>
	<div class="$field_classes">
	    <select
	        name="$this->input_key"
	        id="$this->input_key"
	    >
	        $options_html
	    </select>
	</div>
</div>
HTML;
    }
}