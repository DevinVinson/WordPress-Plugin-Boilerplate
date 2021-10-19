<?php

namespace Admin\Inputs;

class SelectField extends InputField
{
    private $options;

    /**
     * @param int $post_id
     * @param string $input_key
     * @param string $title
     * @param array $css_classes
     */
    public function __construct(
        int $post_id,
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

    private function create_option_html(string $value, string $label): string {
        $selected = $value === $this->meta_value ? "selected" : null;
        return <<<HTML
<option value="$value" $selected>$label</option>
HTML;

    }

    private function get_options_html(): string {
        $options_html = "";
        foreach ($this->options as $value => $label) {
            $options_html .= $this->create_option_html($value, $label);
        }
        return $options_html;
    }

    public function get_html(): string {
        $field_classes = $this->concat_css_classes();
        $options_html = $this->get_options_html();

        return <<<HTML
<label for="$this->meta_key">$this->title</label>
<div class="$field_classes">
    <select
        name="$this->input_key"
        id="$this->input_key"
    >
        $options_html
    </select>
</div>
HTML;
    }
}