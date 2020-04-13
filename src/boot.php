<?php
/**
 * Initialises the plugin requriements.
 *
 * @package SouthAfricaCovid19Banner
 */

namespace SeagynDavis\SouthAfricaCovid19Banner;

require_once 'shortcode.php';
require_once 'widget.php';
require_once 'settings-page.php';
require_once 'display.php';

/**
 * Initialises the app.
 */
function boot() {
	add_shortcode( 'south-african-covid-19-banner', 'SeagynDavis\SouthAfricaCovid19Banner\Shortcode\shortcode' );
	add_shortcode( 'south-africa-covid-19-banner', 'SeagynDavis\SouthAfricaCovid19Banner\Shortcode\shortcode' );

	add_action(
		'widgets_init',
		function() {
			register_widget( 'SeagynDavis\SouthAfricaCovid19Banner\Widget\Banner' );
		}
	);

	add_filter(
		'body_class',
		function( $classes ) {
			$options = get_option( 'sac19b_options' );

			return array_merge( $classes, array( $options['position'] ) );
		}
	);

	add_action( 'admin_init', 'SeagynDavis\SouthAfricaCovid19Banner\SettingsPage\settings_init' );

	add_action( 'admin_menu', 'SeagynDavis\SouthAfricaCovid19Banner\SettingsPage\options_page' );

	add_action( 'wp_footer', 'SeagynDavis\SouthAfricaCovid19Banner\BannerDisplay\banner_display' );
}
