<?php
/**
 * Initialises the plugin requriements.
 *
 * @package ShutterstockAudioWidget
 */

namespace SeagynDavis\SouthAfricaCovid19Banner;

require_once 'shortcode.php';
require_once 'widget.php';

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
}
