<?php
/**
 * SA Corona Banner Call Backs file.
 */

/**
 * top level menu item callback functions
 */
function options_page_content() {
  // check user capabilities
  if ( ! current_user_can( 'manage_options' ) ) {

    return;

  }

  if ( isset( $_GET['settings-updated'] ) ) {

    // add settings saved message with the class of "updated"
    add_settings_error( 'rbd_messages', 'rbd_message', __( 'Settings Saved', 'rbd' ), 'updated' );

  }

  // show error/update messages
  settings_errors( 'rbd_messages' );

  ?>

    <div class="wrap">

      <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

      <form action="options.php" method="post">
        <?php
        // output security fields for the registered setting "rbd"
        settings_fields( 'rbd' );
        // output setting sections and their fields
        // (sections are registered for "rbd", each field is registered to a specific section)
        do_settings_sections( 'rbd' );
        // output save settings button
        submit_button( 'Save Settings' );
        ?>
      </form>

    </div>

  <?php

}


/**
 * custom option and settings:
 * callback functions
 */
function section_cb( $args ) {

}

// call back with the form
function add_form( $args ) {

  // get the value of the setting we've registered with register_setting()
  $options = get_option( 'rbd_options' );

  ?>

  <select id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['rbd_custom_data'] ); ?>"
  name="rbd_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
  >
    <option value="covid_top_scroll" <?php echo ( "covid_top_scroll" === $options['rbd_position'] ? 'selected' : '' );?> >
    <?php esc_html_e( 'Top & scroll', 'rbd' ); ?>
    </option>
    <option value="covid_top_fixed" <?php echo ( "covid_top_fixed" === $options['rbd_position'] ? 'selected' : '' );?> >
    <?php esc_html_e( 'Top & fixed', 'rbd' ); ?>
    </option>
    <option value="covid_bottom_scroll" <?php echo ( "covid_bottom_scroll" === $options['rbd_position'] ? 'selected' : '' );?> >
    <?php esc_html_e( 'Bottom & scroll', 'rbd' ); ?>
    </option>
    <option value="covid_bottom_fixed" <?php echo ( "covid_bottom_fixed" === $options['rbd_position'] ? 'selected' : '' );?> >
    <?php esc_html_e( 'Bottom & fixed', 'rbd' ); ?>
    </option>
  </select>

  <p class="description">
  <?php esc_html_e( 'Selected your preferred banner position.', 'rbd' ); ?>
  </p>

  <ul>
    <li><strong>Top & scroll : </strong>Displays at the top of the site and scrolls with the page.</li>
    <li><strong>Top & fixed : </strong>Displays fixed at the top of the screen and the site scrolls behind it.</li>
    <li><strong>Bottom & scroll : </strong>Displays at the bottom of the site and is only viewed once scrolled to the bottom of the site.</li>
    <li><strong>Bottom & fixed : </strong>Displays fixed at the bottom of the screen and the site scrolls behind it.</li>
  </ul>

  <?php

}

?>
