<?php
/**
 * Create a settings page for different banner options.
 *
 * @package SouthAfricaCovid19Banner
 */

namespace SeagynDavis\SouthAfricaCovid19Banner\SettingsPage;

/**
 * Create top level menu item
 */
function options_page() {
	add_menu_page(
		'SA Coronoa Banner',
		'SA COVID-19',
		'manage_options',
		'sa-covid-19',
		'SeagynDavis\SouthAfricaCovid19Banner\SettingsPage\options_page_content',
		plugin_dir_url( __FILE__ ) . ( '../resources/images/flag.png' ),
		2
	);

}

/**
 * Create settings
 */
function settings_init() {
	register_setting( 'south-african-covid-19-banner', 'sac19b_options' );

	add_settings_section(
		'sac19b_section',
		__( 'South African COVID-19 Banner', 'south-african-covid-19-banner' ),
		'SeagynDavis\SouthAfricaCovid19Banner\SettingsPage\section_cb',
		'south-african-covid-19-banner'
	);

	add_settings_field(
		'position',
		__( 'Banner style', 'south-african-covid-19-banner' ),
		'SeagynDavis\SouthAfricaCovid19Banner\SettingsPage\add_form',
		'south-african-covid-19-banner',
		'sac19b_section',
		[
			'label_for'          => 'position',
			'class'              => 'sac19b_row',
			'sac19b_custom_data' => 'custom',
		]
	);
}


/**
 * Top level menu item callback functions
 */
function options_page_content() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	if ( isset( $_POST['sac19b_options_nonce'] ) ) {
		$nonce = sanitize_text_field( wp_unslash( $_POST['sac19b_options_nonce'] ) );

		if ( ! wp_verify_nonce( $nonce, 'sac19b_settings_update' ) ) {
			return;
		}
	}

	if ( isset( $_GET['settings-updated'] ) ) {
		add_settings_error(
			'sac19b_messages',
			'sac19b_message',
			__( 'Settings Saved', 'south-african-covid-19-banner' ),
			'updated'
		);
	}
	settings_errors( 'sac19b_messages' );

	require_once 'html/admin/settings.php';
}

/**
 * Empty section callback for now.
 */
function section_cb() {

}

/**
 * Creates the form.
 *
 * @param array $args Array of arguments.
 */
function add_form( $args ) {
	require_once 'html/admin/form.php';

	wp_nonce_field( 'sac19b_settings_update', 'sac19b_options_nonce' );
}
