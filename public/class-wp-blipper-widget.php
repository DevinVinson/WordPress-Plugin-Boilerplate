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
   * The plugin's settings.
   *
   * @since    0.0.1
   * @access   private
   * @var      WP_Blipper_Settings    $wp_blipper_settings    Registers the plugin's settings and options.
   */
  private $wp_blipper_settings;

  /**
   * The Polaroid|Blipfoto interface.
   *
   * @since    0.0.1
   * @access   private
   * @var      WP_Blipper_Interface   $wp_blipper_interface   The Polaroid|Blipfoto interface
   */
  private $wp_blipper_interface;

  /**
   * Sets up the widget's name etc
   *
   * @since    0.0.1
   * @access   public
   */
  public function __construct() {

    parent::__construct(
      'wp_blipper_widget', // base ID
      __( 'WP Blipper', 'wp-blipper-widget' ), // name
      array( 'description' => __( 'Displays your latest blip', 'text_domain'), ) // args
    );

    $this->load_dependencies();

  }

  /**
   * Load the required dependencies for the widget.
   *
   * - WP_Blipper_Interface.  The interface to the Polaroid|Blipfoto API.
   *
   * Create an instance of the Polaroid|Blipfoto interface.  The interface will do the work; the widget will display it.
   *
   * @since    0.0.1
   * @access   private
   */
  private function load_dependencies() {

    /**
     * The plugin class that contains the settings.
     */
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wp-blipper-settings.php';
    $this->wp_blipper_settings = new WP_Blipper_Settings();

    /**
     * The plugin class that contains the Polaroid|Blipfoto data.
     */
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wp-blipper-interface.php';
    $this->wp_blipper_interface = new WP_Blipper_Interface();

  }

  /**
   * Outputs the content of the widget
   * Front-end display of widget.
   *
   * @see WP_Widget::widget()
   *
   * @since    0.0.1
   * @access   public
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
  public function widget( $args, $instance ) {

    echo $args['before_widget'];
    if ( ! empty( $instance['title'] ) ) {
      echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
    }

    //$this->wp_blipper_interface->do_stuff();

    echo __( 'Hello, world!', 'text_domain' );
    echo $args['after_widget'];

  }

  /**
   * Outputs the options form on admin
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @since    0.0.1
   * @access   public
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
   * @since    0.0.1
   * @access   public
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