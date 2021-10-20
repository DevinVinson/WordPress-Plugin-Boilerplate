<?php

namespace Admin\Inputs;

class UnitField extends InputField
{
    private $input_unit;

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
        string $input_unit,
        array $css_classes = []
    )
    {
        parent::__construct(
            $post_id,
            "number",
            $input_key,
            $title,
            $css_classes
        );

        $this->input_unit = $input_unit;
    }

	/**
	 * Returns formatted HTML to be displayed in a WordPress post's meta box.
	 *
	 * @return string Formatted HTML
	 */
    public function get_html(): string {
        $field_classes = $this->concat_css_classes(["has_input_unit"]);

        return <<<HTML
<div class="input_row">
	<label for="$this->meta_key">$this->title</label>
	<div class="$field_classes">
	    <input
	        name="$this->input_key"
	        id="$this->input_key"
	        type="$this->input_type"
	        value="$this->meta_value"
	        dir="rtl"
	        min="0"
	        maxlength="6"
	        spellcheck="false"
	    >
	    <div class="input_unit">$this->input_unit</div>
	</div>
</div>
HTML;
    }
}