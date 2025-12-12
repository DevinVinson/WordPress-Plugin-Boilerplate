<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Oxy_Form_Component extends OxyEl {

    function name() {
        return __( 'Form Container', 'oxygen-form-builder' );
    }

    function slug() {
        return 'form-container';
    }

    function icon() {
        return CT_FW_URI . '/toolbar/UI/oxygen-icons/panel/div.svg';
    }

    function button_place() {
        return "form_elements";
    }

    function render( $options, $defaults, $content ) {
        $action = isset( $options['action'] ) ? esc_attr( $options['action'] ) : '';
        $method = isset( $options['method'] ) ? esc_attr( $options['method'] ) : 'post';

        echo "<form action='{$action}' method='{$method}'>";
        // Render inner content which will be the form fields
        echo do_shortcode( $content );
        echo '</form>';
    }

    function controls() {

        $form_section = $this->addControlSection( "form_settings", __("Form Settings", "oxygen-form-builder"), "assets/icon.png", $this );

        $form_section->addControl(
            "action",
            array(
                "label" => __("Action URL", "oxygen-form-builder"),
                "type" => "textfield",
            )
        );

        $form_section->addControl(
            "method",
            array(
                "label" => __("Method", "oxygen-form-builder"),
                "type" => "radio",
                "value" => "post",
                "options" => array(
                    "post" => __("POST", "oxygen-form-builder"),
                    "get" => __("GET", "oxygen-form-builder")
                )
            )
        );
    }

    function is_shortcode_tag() {
        return true;
    }
}
