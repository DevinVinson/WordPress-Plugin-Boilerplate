<?php

/**
 * The file that defines the plugin settings
 *
 * A class definition that defines the settings and the settings page in the
 * admin area.
 *
 * @link       http://pandammonium.org/dev/wp-blipper/
 * @since      0.0.1
 *
 * @package    WP_Blipper
 * @subpackage WP_Blipper/admin
 */

defined( 'ABSPATH' ) or die();
defined( 'WPINC' ) or die();

class WP_Blipper_Settings {

  /**
   * Settings variables.
   *
   * @since   0.0.1
   * @access  private
   */
  private $user_setting_name;
  private $user_setting_values;
  private $user_setting_values_default;
  private $oauth_setting_name;
  private $oauth_setting_values;
  private $oauth_setting_values_default;

  /**
   * Set up a settings page under the settings menu in the admin section.
   */
  public function __construct() {

    add_action( 'admin_menu', array( &$this, 'wp_blipper_admin_menu' ) );
    // Ensure the admin page is initialised only when needed:
      // Not calling this results in repeated error messages, if error messages are displayed.
      // This looks pants.
    if ( ! empty ( $GLOBALS['pagenow'] )
      and ( 'options-general.php' === $GLOBALS['pagenow']
      or 'options.php' === $GLOBALS['pagenow']
      )
    ) {
      add_action( 'admin_init', array( &$this, 'wp_blipper_admin_init' ) );
    }
  }

  /**
   * Create a new item in the admin menu that will lead to the plugin settings
   * page.
   *
   * Use add_options_page() during the admin_menu action.
   *
   * @since   0.0.1
   * @access  public
   */
  public function wp_blipper_admin_menu() {

    add_options_page( 
      'WP Blipper Settings',    // page title (not to be confused with page header)
      'WP Blipper',             // menu title
      'manage_options',         // capabiltity req'd to access options page
      'options-wp-blipper',     // menu slug
      array( &$this, 'wp_blipper_options_page' ) // callback function
    );

  }

  /**
   * Use register_settings() to tell WP that we're using an option with the
   * WP Settings API (where these functions live).
   * Use add_settings_section() to create a new section.
   * Use add_settings_field() to add a field to the section.
   *
   * @since   0.0.1
   * @access  public
   */
  public function wp_blipper_admin_init() {

    $this->user_setting_name = 'wp-blipper-settings-user';
    $this->user_setting_values_default = array (
      'user:username'        => ''
    );
    $this->user_setting_values = get_option( $this->user_setting_name, $this->user_setting_values_default );

    $this->oauth_setting_name = 'wp-blipper-settings-oauth';
    $this->oauth_setting_values_default = array (
      'oauth:client-id'      => '',
      'oauth:client-secret'  => '',
      'oauth:access-token'   => ''
    );
    $this->oauth_setting_values = get_option( $this->oauth_setting_name, $this->oauth_setting_values_default );

    register_setting( // user
      'wp-blipper-settings-group',                   // the option group — used when rendering options page
      $this->user_setting_name,                // option name — used with functions like get_option() and update_option()
      array( &$this, 'wp_blipper_username_sanitise' )     // validate the input
    );
    register_setting( // client id
      'wp-blipper-settings-group',                          // the option group — used when rendering options page
      $this->oauth_setting_name,                       // option name — used with functions like get_option() and update_option()
      array( &$this, 'wp_blipper_oauth_client_id_sanitise' )      // validate the input
    );
    register_setting( // client secret
      'wp-blipper-settings-group',                          // the option group — used when rendering options page
      $this->oauth_setting_name,                   // option name — used with functions like get_option() and update_option()
      array( &$this, 'wp_blipper_oauth_client_secret_sanitise' )  // validate the input
    );
    register_setting( // access token
      'wp-blipper-settings-group',                          // the option group — used when rendering options page
      $this->oauth_setting_name,                    // option name — used with functions like get_option() and update_option()
      array( &$this, 'wp_blipper_oauth_access_token_sanitise' )   // validate the input
    );

    add_settings_section( // user
      'wp-blipper-user-section',                          // section ID — used to add fields to this section
      'Blipfoto User',                                    // section title
      array( &$this, 'wp_blipper_user_section_render' ), // section callback function 
      'options-wp-blipper'                               // page ID — the menu slug used in add_options_page()
    );
    add_settings_section( // OAuth
      'oauth:section',                                // section ID — used to add fields to this section
      'Blipfoto OAuth Authorisation',                            // section title
      array( &$this, 'wp_blipper_oauth_section_render' ),        // section callback function 
      'options-wp-blipper'                                        // page ID — the menu slug used in add_options_page()
    );

    add_settings_field( // username
      'user:username',                              // field ID
      'Blipfoto Username',                                // field title — displayed on LHS of the control
      array( &$this, 'wp_blipper_username_field_render' ), // field callback function
      'options-wp-blipper',                               // page ID — the menu slug used in add_options_page()
      'wp-blipper-user-section',                           // section ID the field is to appear in
      array(
        'type'          => 'text',
        'name'          => $this->user_setting_name . '[user:username]',
        'value'         => esc_attr( $this->user_setting_values['user:username'] ),
        'setting_name'  => $this->user_setting_name
      )
    );
    add_settings_field( // client id
      'oauth:client-id',                              // field ID
      'Blipfoto Client ID',                                       // field title — displayed on LHS of the control
      array( &$this, 'wp_blipper_client_id_field_render' ),       // field callback function
      'options-wp-blipper',                                       // page ID — the menu slug used in add_options_page()
      'oauth:section',                                 // section ID the field is to appear in
      array(
        'type'          => 'text',
        'name'          => $this->oauth_setting_name . '[oauth:client-id]',
        'value'         => esc_attr( $this->oauth_setting_values['oauth:client-id'] ),
        'setting_name'  => $this->oauth_setting_name
      )
    );
    add_settings_field( // client secret
      'oauth:client-secret',                          // field ID
      'Blipfoto Client Secret',                                   // field title — displayed on LHS of the control
      array( &$this, 'wp_blipper_client_secret_field_render' ),   // field callback function
      'options-wp-blipper',                                       // page ID — the menu slug used in add_options_page()
      'oauth:section',                                 // section ID the field is to appear in
      array(
        'type'          => 'text',
        'name'          => $this->oauth_setting_name . '[oauth:client-secret]',
        'value'         => esc_attr( $this->oauth_setting_values['oauth:client-secret'] ),
        'setting_name'  => $this->oauth_setting_name
      )
    );
    add_settings_field( // access token
      'oauth:access-token',                           //field ID
      'Blipfoto Access Token',                                    // field title — displayed on LHS of the control
      array( &$this, 'wp_blipper_access_token_field_render' ),    // field callback function
      'options-wp-blipper',                                       // page ID — the menu slug used in add_options_page()
      'oauth:section',                                 // section ID the field is to appear in
      array(
        'type'          => 'text',
        'name'          => $this->oauth_setting_name . '[oauth:access-token]',
        'value'         => esc_attr( $this->oauth_setting_values['oauth:access-token'] ),
        'setting_name'  => $this->oauth_setting_name
      )
    );

   // $this->

  }

  /**
   * Callback function.
   * Output information about the Polaroid|Blipfoto user.
   *
   * @since     0.0.1
   * @access    public
   */
  public function wp_blipper_user_section_render() {

    ?>
      <p>You need to provide your Polaroid|Blipfoto username.  This is the name you use to log in to Polaroid|Blipfoto.</p>
      <p>If you don't have a Polaroid|Blipfoto account, then you can't use this plugin.</p>
    <?php
    echo '<pre>';
    var_dump($this);
    echo '</pre>';
  }

  /**
   * Callback function.
   * Output the instructions for setting the plugin's options.
   *
   * @since     0.0.1
   * @access    public
   */
  public function wp_blipper_oauth_section_render() {

    ?>
      <p>You need to authorise access to your Polaroid|Blipfoto account to use this plugin.  <em>You can revoke access at any time.</em>  The instructions below tell you how to authorise access and how to revoke access.</p>
      <h4>How to authorise your Polaroid|Blipfoto account</h4>
      <p>To allow WordPress to access your Polaroid|Blipfoto account, you need to carry out a few simple steps.</p>
      <ol>
        <li>Open the <a href="https://www.polaroidblipfoto.com/developer/apps" rel="nofollow">the Polaroid|Blipfoto apps page</a> in a new tab or window.</li>
        <li>Press the <i>Create new app</i> button.</li>
        <li>In the <i>Name</i> field, give your app any name you like, for example, <i>My super-duper app</i>.</li>
        <li>The <i>Type</i> field should be set to <i>Web application</i>.</li>
        <li>Optionally, describe your app in the <i>Description</i> field, so you know what it does.</li>
        <li>In the <i>Website</i> field, enter the URL of your website (probably <code><?php echo home_url(); ?></code>).</li>
        <li>Leave the <i>Redirect URI</i> field blank.</li>
        <li>Indicate that you agree to the <i>Developer rules</i>.</li>
        <li>Press the <i>Create a new app</i> button.</li>
        <li>You should now see your <i>Client ID</i>, <i>Client Secret</i> and <i>Access Token</i>.  Copy and paste these into the corresponding fields below.</li>
      </ol>
      <h4>How to revoke access to your Polaroid|Blipfoto account</h4>
      <p>It's simple to revoke access.  We hope you don't want to do this, but if you do, the instructions are laid out below.</p>
      <ol>
        <li>Go to <a href="https://www.polaroidblipfoto.com/settings/apps" rel="nofollow">your Polaroid|Blipfoto app settings</a>.</li>
        <li>Select the app whose access you want to revoke (the one you created above).</li>
        <li>Press the <i>Save changes</i> button.</li>
      </ol>
    <?php
    echo '<pre>';
    var_dump($this);
    echo '</pre>';
  }

  /**
   * Callback function.
   * Output the username, if there is one, in the username field.
   *
   * @since     0.0.1
   * @access    public
   */
  public function wp_blipper_username_field_render( $args ) {

    echo '<pre>';
    var_dump($args);
    echo '</pre>';

    printf( "<input type=%s name=%s value=%s>",
      $args['type'],
      $args['name'],
      $args['value']
     );

  }

  /**
   * Callback function.
   * Output the client id, if there is one, in the client id field.
   *
   * @since     0.0.1
   * @access    public
   */
  public function wp_blipper_client_id_field_render( $args ) {

    echo '<pre>';
    var_dump($args);
    echo '</pre>';

    printf( "<input type=%s name=%s value=%s>",
      $args['type'],
      $args['name'],
      $args['value']
     );

  }

  /**
   * Callback function.
   * Output the client secret, if there is one, in the client secret field.
   *
   * @since     0.0.1
   * @access    public
   */
  public function wp_blipper_client_secret_field_render( $args ) {

    echo '<pre>';
    var_dump($args);
    echo '</pre>';

    printf( "<input type=%s name=%s value=%s>",
      $args['type'],
      $args['name'],
      $args['value']
     );

  }

  /**
   * Callback function.
   * Output the access token, if there is one, in the access token field.
   *
   * @since     0.0.1
   * @access    public
   */
  public function wp_blipper_access_token_field_render( $args ) {

    echo '<pre>';
    var_dump($args);
    echo '</pre>';

    printf( "<input type=%s name=%s value=%s>",
      $args['type'],
      $args['name'],
      $args['value']
     );

  }

  /**
   * Sanitise the username.
   * Make sure the input comprises only printable characters; otherwise, return an empty string.
   *
   * @since     0.0.1
   * @access    public
   */
  public function wp_blipper_username_sanitise( $input ) {

//    $output = '';
//    if ( true == ctype_print( $input ) ) {
      $output = $input;
//    } else if ( empty( $input ) ) {
//      add_settings_error( 'user:username', 'invalid-username', 'Please enter your Polaroid|Blipfoto username.' );
//    } else {
//      add_settings_error( 'user:username', 'invalid-username', 'The username you entered contains invalid characters.  Please check it and try again.' );
//    }
    return $output;

  }

  /**
   * Sanitise the OAuth credentials.
   * Make sure the input comprises only alphanumeric characters; otherwise, return an empty string.
   *
   * @since     0.0.1
   * @access    public
   */
  public function wp_blipper_oauth_client_id_sanitise( $input ) {

//    $output = '';
//    if ( true == ctype_alnum( $input ) ) {
      $output = $input;
//    } else if ( empty( $input ) ) {
//      add_settings_error( 'oauth:setting-client-id', 'invalid-oauth-client-id', 'Please enter your Polaroid|Blipfoto client id.' );
//    } else {
//      add_settings_error( 'oauth:setting-client-id', 'invalid-oauth-client-id', 'The client ID must be alphanumeric.  Please check you\'ve copied and pasted it correctly.' );
//    }
    return $output;

  }
  public function wp_blipper_oauth_client_secret_sanitise( $input ) {

//    $output = '';
//    if ( true == ctype_alnum( $input ) ) {
      $output = $input;
//    } else if ( empty( $input ) ) {
//      add_settings_error( 'oauth:setting-client-secret', 'invalid-oauth-client-secret', 'Please enter your Polaroid|Blipfoto client secret.' );
//    } else {
//      add_settings_error( 'oauth:setting-client-secret', 'invalid-oauth-client-secret', 'The client secret must be alphanumeric.  Please check you\'ve copied and pasted it correctly.' );
//    }
    return $output;

  }
  public function wp_blipper_oauth_access_token_sanitise( $input ) {

//    $output = '';
//    if ( true == ctype_alnum( $input ) ) {
      $output = $input;
//    } else if ( empty( $input ) ) {
//      add_settings_error( 'oauth:setting-access-token', 'invalid-oauth-access-token', 'Please enter your Polaroid|Blipfoto access token.' );
//    } else {
//      add_settings_error( 'oauth:setting-access-token', 'invalid-oauth-access-token', 'The access token must be alphanumeric.  Please check you\'ve copied and pasted it correctly.' );
//    }
    return $output;

  }

  /**
   * Render a submit button.
   *
   * @since     0.0.1
   * @access    public
   */
  public function wp_blipper_options_page() {

    ?>
    <div class="wrap">
      <h2>WP Blipper Settings</h2>
      <form action="options.php" method="POST">
        <?php
          // render a few hidden fields that tell WP which settings are going to be updated on this page:
          settings_fields( 'wp-blipper-settings-group' );
          // output all the sections and fields that have been added to the options page (with slug options-wp-blipper):
          do_settings_sections( 'options-wp-blipper' );
        ?>
        <?php submit_button(); ?>
      </form>
    </div>
    <?php

  }

  /**
   * Get the value of the specified setting.
   * //This would be so much easier of the settings were stored in an array.
   *
   * @since     0.0.1
   * @access    public
   * @var       string    $setting_to_get    One of: 'username', 'client-id', 'client-secret' or 'access-token'.
   */
    public function get_user_setting( $setting_to_get ) {

    switch ( $setting_to_get ){
      case 'username':
        return esc_attr( get_option( 'user:username' ) );
      default:
        return null;
    }

  }

  /**
   * Get the value of the specified setting.
   * This would be so much easier of the settings were stored in an array.
   *
   * @since     0.0.1
   * @access    public
   * @var       string    $setting_to_get    One of: 'username', 'client-id', 'client-secret' or 'access-token'.
   */
    public function get_oauth_setting( $setting_to_get ) {

    switch ( $setting_to_get ){
      case 'client-id':
        return esc_attr( get_option( 'oauth:setting-client-id' ) );
      case 'client-secret':
        return esc_attr( get_option( 'oauth:setting-client-secret' ) );
      case 'access-token':
        return esc_attr( get_option( 'oauth:setting-access-token' ) );
      default:
        return null;
    }

  }

}
