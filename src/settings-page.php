<?php
/**
 * Create a settings page for different banner options.
 *
 * @package SouthAfricaCovid19Banner
 */

namespace SeagynDavis\SouthAfricaCovid19Banner\SettingsPage;

include_once 'admin/sa-covid-page.php';

/**
 * Create top level menu item
 */
function rbd_options_page() {

  // add top level menu page
  add_menu_page(
    'SA Coronoa Banner',
    'SA COVID-19',
    'manage_options',
    'sa-covid-19',
    'rbd_options_page_content',
    plugin_dir_url( __FILE__ ) . ( '../resources/images/flag.png' ),
    2
  );

}

/**
 * Create settings
 */
function rbd_settings_init() {

  // register a new setting for "rbd" page
  register_setting( 'rbd', 'rbd_options' );

  // register a new section in the "rbd" page
  add_settings_section(
    'rbd_section',
    __( '', 'rbd' ),
    'rbd_section_cb',
    'rbd'
  );

  // register a new field in the "rbd_section" section, inside the "rbd" page
  add_settings_field(
    'rbd_position',
    __( 'Banner style', 'rbd' ),
    'rbd_add_form',
    'rbd',
    'rbd_section',
    [
      'label_for'           => 'rbd_position',
      'class'               => 'rbd_row',
      'rbd_custom_data'  => 'custom',
    ]
  );
}
