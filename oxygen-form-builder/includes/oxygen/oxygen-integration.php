<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Include components only when Oxygen Builder is active
if ( class_exists( 'OxyEl' ) ) {

    // Add a custom section to the "+ Add" panel
    function oxygen_form_builder_add_plus_section() {
        oxygen_add_plus_section( 'form_elements', __( 'Form Elements', 'oxygen-form-builder' ) );
    }
    add_action( 'oxygen_add_plus_sections', 'oxygen_form_builder_add_plus_section' );

    // Load components
    require_once 'form-component.php';
    require_once 'input-component.php';
    require_once 'text-input.php';
    require_once 'email-input.php';
    require_once 'textarea-input.php';
    require_once 'dropdown-input.php';

    // Instantiate components after Oxygen Builder is fully loaded
    function oxygen_form_builder_init_components() {
        new Oxy_Form_Component();
        new Oxy_Text_Input_Component();
        new Oxy_Email_Input_Component();
        new Oxy_Textarea_Input_Component();
        new Oxy_Dropdown_Input_Component();
    }
    add_action( 'oxygen_vsb_after_init', 'oxygen_form_builder_init_components' );
}
