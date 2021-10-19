<?php

namespace Admin\Inputs;

class InputField
{
    protected $post_id;
    protected $input_type;
    protected $input_key;
    protected $title;
    protected $css_classes;
    protected $meta_key;
    protected $meta_value;

    public function __construct(
        int $post_id,
        string $input_type,
        string $input_key,
        string $title,
        array $css_classes = []
    )
    {
        $this->title = $title;
        $this->input_key = $input_key;
        $this->input_type = $input_type;


        $this->css_classes = array_unique(array_merge(
            $css_classes,
            [
                'input_field',
                $input_type,
                $input_key,
            ]
        ));

        $this->meta_key = "_$input_key";
        $this->meta_value = "value";
    }

    public function get_title(): string {
        return $this->title;
    }
    public function get_input_key(): string {
        return $this->input_key;
    }
    public function get_meta_key(): string {
        return $this->meta_key;
    }
    public function save_meta_key(): bool {
        return true;
    }

    public function concat_css_classes(array $additional_classes = []): string {
        return implode(
            ' ',
            array_unique(array_merge([
                $additional_classes
            ], $this->css_classes)
        ));
    }
}