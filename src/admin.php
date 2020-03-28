<?php
/**
 * Displays the banner via a shortcode.
 *
 * @package SouthAfricaCovid19Banner
 */

namespace SeagynDavis\SouthAfricaCovid19Banner\Admin;

/**
 * Set transient when plugin is activated.
 */
function plugin_activation() {

  set_transient( 'admin_activation_notice', true, 5 );

}

/**
 * Add another activation message.
 * Includes a URL to the settings page
 */
function admin_activation_notice(){

  /* Check transient, if available display notice */
  if( get_transient( 'admin_activation_notice' ) ){

    // Thank you message when activat
    echo '<div class="updated notice is-dismissible">'.
      '<p>Thank you for activating this plugin and giving South Africa the support it needs, <strong>You are awesome</strong>! <a href="'. site_url('/wp-admin/admin.php?page=sa-covid-19') .'">View plugin settings</a></p>'.
    '</div>';

    /* Delete transient, only display this notice once. */
    delete_transient( 'admin_activation_notice' );

  }

}
