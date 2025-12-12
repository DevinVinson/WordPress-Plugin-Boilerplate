<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Oxy_Textarea_Input_Component extends Oxy_Input_Component {

    function name() {
        return __( 'Textarea Input', 'oxygen-form-builder' );
    }

    function slug() {
        return 'textarea-input';
    }

    function icon() {
        return CT_FW_URI . '/toolbar/UI/oxygen-icons/panel/code-block.svg';
    }

    function render( $options, $defaults, $content ) {
        $name = isset( $options['name'] ) ? esc_attr( $options['name'] ) : '';
        $placeholder = isset( $options['placeholder'] ) ? esc_attr( $options['placeholder'] ) : '';
        $required = isset( $options['required'] ) && $options['required'] == 'yes' ? 'required' : '';

        echo "<textarea name='{$name}' placeholder='{$placeholder}' {$required}></textarea>";
    }
}
