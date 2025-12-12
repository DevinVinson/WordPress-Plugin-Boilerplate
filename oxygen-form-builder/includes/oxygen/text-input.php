<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Oxy_Text_Input_Component extends Oxy_Input_Component {

    function name() {
        return __( 'Text Input', 'oxygen-form-builder' );
    }

    function slug() {
        return 'text-input';
    }

    function icon() {
        return CT_FW_URI . '/toolbar/UI/oxygen-icons/panel/text.svg';
    }

    function render( $options, $defaults, $content ) {
        $name = isset( $options['name'] ) ? esc_attr( $options['name'] ) : '';
        $placeholder = isset( $options['placeholder'] ) ? esc_attr( $options['placeholder'] ) : '';
        $required = isset( $options['required'] ) && $options['required'] == 'yes' ? 'required' : '';

        echo "<input type='text' name='{$name}' placeholder='{$placeholder}' {$required}>";
    }
}
