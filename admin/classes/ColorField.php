<?php

namespace Admin\Inputs;

class ColorField extends InputField
{
    private $input_unit = "#";

    /**
     * @param string $post_id
     * @param string $input_key
     * @param string $title
     * @param array $css_classes
     */
    public function __construct(
        string $post_id,
        string $input_key,
        string $title,
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
    }

	/**
	 * Returns formatted HTML to be displayed in a WordPress post's meta box.
	 *
	 * @return string Formatted HTML
	 */
    public function get_html(): string {
        $field_classes = $this->concat_css_classes(["has_input_unit", "prepend_input_unit"]);

        return <<<HTML
<div class="input_row">
	<label for="$this->meta_key">$this->title</label>
	<div class="$field_classes">
	    <div class="input_unit prepend">$this->input_unit</div>
	    <input
	        name="$this->input_key"
	        id="$this->input_key"
	        type="$this->input_type"
	        value="$this->meta_value"
	        maxlength="6"
	        spellcheck="false"
	    >
	</div>
</div>
HTML;
    }
}