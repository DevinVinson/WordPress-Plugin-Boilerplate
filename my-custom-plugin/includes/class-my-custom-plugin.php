<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class My_Custom_Plugin {
    
    public function run() {
        add_action( 'admin_notices', array( $this, 'custom_admin_notice' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );
    }

    public function custom_admin_notice() {
        ?>
        <div class="notice my-custom-plugin-notice is-dismissible">
            <p><?php _e( 'This is a custom admin notice from My Custom Plugin!', 'my-custom-plugin' ); ?></p>
        </div>
        <?php
    }

    public function enqueue_styles() {
        wp_enqueue_style( 'my-custom-plugin-style', MY_CUSTOM_PLUGIN_URL . 'assets/style.css', array(), '1.0.0' );
    }
}
