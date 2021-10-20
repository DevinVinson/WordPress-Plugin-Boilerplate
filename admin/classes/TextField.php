<?php

namespace Admin\Inputs;

class TextField extends InputField
{
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
        $field_classes = $this->concat_css_classes();

        return <<<HTML
<div class="input_row">
	<label for="$this->meta_key">$this->title</label>
	<div class="$field_classes">
	    <input
	        name="$this->input_key"
	        id="$this->input_key"
	        type="$this->input_type"
	        value="$this->meta_value"
	    >
	</div>
</div>
HTML;
    }
}