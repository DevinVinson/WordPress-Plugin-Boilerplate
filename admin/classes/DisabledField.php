<?php

namespace Admin\Inputs;

class DisabledField extends InputField
{
    private $display_value;

    /**
     * @param int $post_id
     * @param string $input_key
     * @param string $title
     * @param string $display_value
     * @param array $css_classes
     */
    public function __construct(
        int $post_id,
        string $input_key,
        string $title,
        string $display_value,
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

        $this->display_value = $display_value;
    }

    public function get_html(): string {
        $field_classes = $this->concat_css_classes();

        return <<<HTML
<label for="$this->meta_key">$this->title</label>
<div class="$field_classes">
    <input
        name="$this->input_key"
        id="$this->input_key"
        type="$this->input_type"
        value="$this->display_value"
        disabled
    >
</div>
HTML;
    }
}