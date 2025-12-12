<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Oxy_Input_Component extends OxyEl {

    function button_place() {
        return "form_elements";
    }

    function controls() {

        $input_section = $this->addControlSection( "input_settings", __("Input Settings", "oxygen-form-builder"), "assets/icon.png", $this );

        $input_section->addControl(
            "name",
            array(
                "label" => __("Name", "oxygen-form-builder"),
                "type" => "textfield",
            )
        );

        $input_section->addControl(
            "placeholder",
            array(
                "label" => __("Placeholder", "oxygen-form-builder"),
                "type" => "textfield",
            )
        );

        $input_section->addControl(
            "required",
            array(
                "label" => __("Required", "oxygen-form-builder"),
                "type" => "radio",
                "value" => "no",
                "options" => array(
                    "yes" => __("Yes", "oxygen-form-builder"),
                    "no" => __("No", "oxygen-form-builder")
                )
            )
        );
    }
}
