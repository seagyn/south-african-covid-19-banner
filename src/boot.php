<?php
/**
 * Initialises the plugin requriements.
 *
 * @package ShutterstockAudioWidget
 */

namespace SeagynDavis\SouthAfricaCovid19Banner;

require_once 'shortcode.php';
require_once 'widget.php';
require_once 'settings-page.php';
require_once 'admin.php';
require_once 'html/banner-display.php';



/**
 * Initialises the app.
 */
function boot() {

	add_shortcode( 'south-african-covid-19-banner', 'SeagynDavis\SouthAfricaCovid19Banner\Shortcode\shortcode' );

	add_action(
		'widgets_init',
		function() {
			register_widget( 'SeagynDavis\SouthAfricaCovid19Banner\Widget\Banner' );
		}
	);

	add_action( 'admin_init', 'SeagynDavis\SouthAfricaCovid19Banner\SettingsPage\rbd_settings_init' );

 	add_action( 'admin_menu', 'SeagynDavis\SouthAfricaCovid19Banner\SettingsPage\rbd_options_page' );

	add_action( 'wp_head', 'SeagynDavis\SouthAfricaCovid19Banner\BannerDisplay\rbd_header_banner' );

	add_action( 'wp_footer', 'SeagynDavis\SouthAfricaCovid19Banner\BannerDisplay\rbd_footer_banner' );

}
