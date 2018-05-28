<?php

/**
 * Defines a custom widget
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin/widgets
 */

/**
 * Defines a custom widget.
 *
 * @since       1.0.0
 * @see         WP_Widget
 * @package     Plugin_Name
 * @subpackage  Plugin_Name/admin/widgets
 * @author      Your Name <email@example.com>
 */
class Plugin_Name_Widget extends WP_Widget {

    /**
     * Sets up a new Plugin_Name_Widget instance.
     *
     * @since 1.0.0
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'plugin_name_widget',
            'description' => __( 'WordPress Plugin Boilerplate' ),
            'customize_selective_refresh' => true,
        );

        parent::__construct( 'plugin_name_widget', __( 'WordPress Plugin Boilerplate' ), $widget_ops );
    }

    /**
     * Outputs the content to be displayed on the front end.
     *
     * @since          1.0.0
     * @access         public
     * @param array    $args                Display arguments.
     * @param array    $instance            Settings for the current Categories widget instance.
     */
    public function widget( $args, $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'WordPress Plugin Boilerplate' );
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        echo $args['before_widget'];

        if ( $title ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        echo $args['after_widget'];
    }

    /**
     * Handles updating settings for the current Plugin_Name_Widget instance.
     *
     * @since          1.0.0
     * @access         public
     * @param array    $new_instance       New settings for this instance.
     * @param array    $old_instance       Old settings for this instance.
     * @return array   Updated settings to save.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field( $new_instance['title'] );

        return $instance;
    }

    /**
     * Outputs the settings form in the WordPress admin area.
     *
     * @since          1.0.0
     * @access         public
     * @param array    $instance           Current settings.
     */
    public function form( $instance ) {
        $title = sanitize_text_field( $instance['title'] );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php
    }
}
