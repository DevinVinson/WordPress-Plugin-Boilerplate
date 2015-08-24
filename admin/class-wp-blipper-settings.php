<?php

/**
 * The file that defines the plugin settings
 *
 * A class definition that defines the settings and the settings page in the admin area.
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
   * Set up a settings page under the settings menu in the admin section.
   */
  public function __construct( $wp_blipper, $version ) {

    $this->$wp_blipper = $wp_blipper;
    $this->$version = $version;

    add_action( 'admin_menu', array( &$this, 'wp_blipper_admin_menu' ) );
    add_action( 'admin_init', array( &$this, 'wp_blipper_admin_init' ) );

    }

  /**
   * Create a new item in the admin menu that will lead to the plugin settings page.
   *
   * Use add_options_page() during the admin_menu action.
   *
   * @since 0.0.1
   */
  function wp_blipper_admin_menu() {

    add_options_page( 
      'WP Blipper settings',    // page title
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
   * @since 0.0.1
   */
  function wp_blipper_admin_init() {

    register_setting( // username
      'wp-blipper-oauth-settings-group',  // the option group — used when rendering options page
      'wp-blipper-oauth-username-setting', // option name — used with functions like get_option() and update_option()
      array( &$this, 'wp_blipper_username_sanitise' )
    );
    register_setting( // client id
      'wp-blipper-oauth-settings-group',    // the option group — used when rendering options page
      'wp-blipper-oauth-client-id-setting',  // option name — used with functions like get_option() and update_option()
      array( &$this, 'wp_blipper_oauth_sanitise' )
    );
    register_setting( // client secret
      'wp-blipper-oauth-settings-group',        // the option group — used when rendering options page
      'wp-blipper-oauth-client-secret-setting',  // option name — used with functions like get_option() and update_option()
      array( &$this, 'wp_blipper_oauth_sanitise' )
    );
    register_setting( // access token
      'wp-blipper-oauth-settings-group',      // the option group — used when rendering options page
      'wp-blipper-oauth-access-token-setting', // option name — used with functions like get_option() and update_option()
      array( &$this, 'wp_blipper_oauth_sanitise' )
    );

    add_settings_section( // OAuth2
      'wp-blipper-oauth2-id',               // section ID — used to add fields to this section
      'Blipfoto OAuth2 authorisation',      // section title
      array( &$this, 'wp_blipper_oauth2_section_callback' ), // section callback function 
      'options-wp-blipper'                  // page ID — the menu slug used in add_options_page()
    );

    add_settings_field( // username
      'wp-blipper-username',                //field ID
      'Blipfoto Username',                  // field title — displayed on LHS of the control
      array( &$this, 'wp_blipper_username_field_callback' ), // field callback function
      'options-wp-blipper',                 // page ID — the menu slug used in add_options_page()
      'wp-blipper-oauth2-id'                // section ID the field is to appear in
    );
    add_settings_field( // client id
      'wp-blipper-oauth2-client-id',         //field ID
      'Blipfoto Client ID',                  // field title — displayed on LHS of the control
      array( &$this, 'wp_blipper_client_id_field_callback' ), // field callback function
      'options-wp-blipper',                  // page ID — the menu slug used in add_options_page()
      'wp-blipper-oauth2-id'                 // section ID the field is to appear in
    );
    add_settings_field( // client secret
      'wp-blipper-oauth2-client-secret',         //field ID
      'Blipfoto Client Secret',                  // field title — displayed on LHS of the control
      array( &$this, 'wp_blipper_client_secret_field_callback' ), // field callback function
      'options-wp-blipper',                      // page ID — the menu slug used in add_options_page()
      'wp-blipper-oauth2-id'                     // section ID the field is to appear in
    );
    add_settings_field( // access token
      'wp-blipper-oauth2-access-token',         //field ID
      'Blipfoto Access Token',                  // field title — displayed on LHS of the control
      array( &$this, 'wp_blipper_access_token_field_callback' ), // field callback function
      'options-wp-blipper',                     // page ID — the menu slug used in add_options_page()
      'wp-blipper-oauth2-id'                    // section ID the field is to appear in
    );

  }

  /**
   * Callback function.
   * Output the instructions for setting the plugin's options.
   *
   * @since 0.0.1
   */
  function wp_blipper_oauth2_section_callback() {

    ?>
    <p>You need to authorise access to your Polaroid|Blipfoto account to use this plugin.  <em>You can revoke access at any time.</em>  The instructions below tell you how to authorise access and how to revoke access.</p>
    <h4>How to authorise your Polaroid|Blipfoto account</h4>
    <p>To allow WordPress to access your Polaroid|Blipfoto account, you need to carry out a few simple steps.</p>
    <ol>
      <li>Enter your Polaroid|Blipfoto username in the username field below.  Your username is the name you use to sign in to Blipfoto.</li>
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

  }

  /**
   * Callback function.
   * Output the username, if there is one, in the username field.
   *
   * @since 0.0.1
   */
  function wp_blipper_username_field_callback() {

    $setting = esc_attr( get_option( 'wp-blipper-oauth-username-setting' ) );
    echo "<input type='text' name='wp-blipper-oauth-username-setting' value='$setting' />";

  }

  /**
   * Callback function.
   * Output the client id, if there is one, in the client id field.
   *
   * @since 0.0.1
   */
  function wp_blipper_client_id_field_callback() {

    $setting = esc_attr( get_option( 'wp-blipper-oauth-client-id-setting' ) );
    echo "<input type='text' name='wp-blipper-oauth-client-id-setting' value='$setting' />";

  }

  /**
   * Callback function.
   * Output the client secret, if there is one, in the client secret field.
   *
   * @since 0.0.1
   */
  function wp_blipper_client_secret_field_callback() {

    $setting = esc_attr( get_option( 'wp-blipper-oauth-client-secret-setting' ) );
    echo "<input type='text' name='wp-blipper-oauth-client-secret-setting' value='$setting' />";

  }

  /**
   * Callback function.
   * Output the access token, if there is one, in the access token field.
   *
   * @since 0.0.1
   */
  function wp_blipper_access_token_field_callback() {

    $setting = esc_attr( get_option( 'wp-blipper-oauth-access-token-setting' ) );
    echo "<input type='text' name='wp-blipper-oauth-access-token-setting' value='$setting' />";

  }

  /**
   * Sanitise the username.
   * Make sure the input comprises only printable characters; otherwise, return an empty string.
   *
   * @since 0.0.1
   */
  function wp_blipper_username_sanitise( $input ) {

    $output = '';
    if ( true == ctype_print( $input ) ) {
      $output = $input;
    } else {
      add_settings_error( 'wp-blipper-oauth-client-id-setting', 'invalid-username', 'Username must not contain unprintable characters.' );
    }
    return $output;

  }

  /**
   * Sanitise the OAuth2 credentials.
   * Make sure the input comprises only alphanumeric characters; otherwise, return an empty string.
   *
   * @since 0.0.1
   */
  function wp_blipper_oauth_sanitise( $input ) {

    $output = '';
    if ( true == ctype_alnum( $input ) ) {
      $output = $input;
    } else {
      add_settings_error( 'wp-blipper-oauth-client-id-setting', 'invalid-oauth-credential', 'OAuth credentials must be alphanumeric.  Please ensure you have copied and pasted the credentials correctly.' );
    }
    return $output;
  }

  /**
   * Render a submit button.
   *
   * @since 0.0.1
   */
  function wp_blipper_options_page() {

    ?>
    <div class="wrap">
      <h2>WP Blipper Options</h2>
      <form action="options.php" method="POST">
        <?php // render a few hidden fields that tell WP which settings are going
              // to be updated on this page:
          settings_fields( 'wp-blipper-oauth-settings-group' ); ?>
        <?php // output all the sections and fields that have been added to the
              // options page:
          do_settings_sections( 'options-wp-blipper' ); ?>
        <?php submit_button(); ?>
      </form>
    </div>
    <?php

  }

}
