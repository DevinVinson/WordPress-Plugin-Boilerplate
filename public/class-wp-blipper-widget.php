<?php

/**
 * The widget used to display the user's latest blip.
 *
 * Adds WP_Blipper_Widget,
 *
 * @link       http://pandammonium.org/dev/wp-blipper/
 * @since      0.0.1
 *
 * @package    Wp_Blipper_Widget
 * @subpackage Wp_Blipper_Widget/public
 */

defined( 'ABSPATH' ) or die();

class WP_Blipper_Widget extends WP_Widget {

  /**
   * The ID of this plugin.
   *
   * @since    0.0.1
   * @access   private
   * @var      string    $wp_blipper    The ID of this plugin.
   */
  private $wp_blipper;

  /**
   * The version of this plugin.
   *
   * @since    0.0.1
   * @access   private
   * @var      string    $version    The current version of this plugin.
   */
  private $version;

  /**
   * Sets up the widget's name etc
   */
  public function __construct() {

    parent::__construct(
      'wp_blipper_widget', // base ID
      __( 'WP Blipper', 'wp-blipper-widget' ), // name
      array( 'description' => __( 'Displays your latest blip', 'text_domain'), ) // args
    );

  }

  /**
   * Outputs the content of the widget
   * Front-end display of widget.
   *
   * @see WP_Widget::widget()
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
  public function widget( $args, $instance ) {

    echo $args['before_widget'];
    if ( ! empty( $instance['title'] ) ) {
      echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
    }
    echo __( 'Hello, world!', 'text_domain' );
    echo $args['after_widget'];

  }

  /**
   * Outputs the options form on admin
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance The widget options. Previously saved values from database.
   */
  public function form( $instance ) {

    $title = ! empty( $instance['title']) ? $instance['title'] : __( 'My latest blip', 'text_domain' );
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"<?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ) ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>"
    </p>
    <?php

  }

  /**
   * Processing widget options on save
   * Sanitize widget form values as they are saved.
   *
   * @see WP_Widget::update()
   *
   * @param array $new_instance Values just sent to be saved.
   * @param array $old_instance Previously saved values from database.
   *
   * @return array Updated safe values to be saved.
   */
  public function update( $new_instance, $old_instance ) {

    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    return $instance;

  }

}