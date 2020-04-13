<?php
/**
 * Displays the banner via a shortcode.
 *
 * @package SouthAfricaCovid19Banner
 */

namespace SeagynDavis\SouthAfricaCovid19Banner\Shortcode;

/**
 * Register a shortcode to display the banner.
 *
 * @return string HTML to output.
 */
function shortcode() {
	\wp_enqueue_style( 'south-african-covid-19-banner', SOUTH_AFRICA_COVID_19_BANNER_URL . 'resources/css/south-african-covid-19-banner.css', null, SOUTH_AFRICA_COVID_19_BANNER_VERSION, false );

	ob_start();

	include_once 'html/banner.php';

	return ob_get_clean();
}
