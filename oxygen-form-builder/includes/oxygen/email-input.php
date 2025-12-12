<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Oxy_Email_Input_Component extends Oxy_Input_Component {

    function name() {
        return __( 'Email Input', 'oxygen-form-builder' );
    }

    function slug() {
        return 'email-input';
    }

    function icon() {
        return CT_FW_URI . '/toolbar/UI/oxygen-icons/panel/icon.svg';
    }

    function render( $options, $defaults, $content ) {
        $name = isset( $options['name'] ) ? esc_attr( $options['name'] ) : '';
        $placeholder = isset( $options['placeholder'] ) ? esc_attr( $options['placeholder'] ) : '';
        $required = isset( $options['required'] ) && $options['required'] == 'yes' ? 'required' : '';

        echo "<input type='email' name='{$name}' placeholder='{$placeholder}' {$required}>";
    }
}
