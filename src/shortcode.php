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
	\wp_enqueue_style( 'south-african-covid-19-banner', SOUTH_AFRICA_COVID_19_BANNER_URL . 'resources/css/south-african-covid-19-banner.min.css', null, SOUTH_AFRICA_COVID_19_BANNER_VERSION, false );

	ob_start();

	include_once 'html/banner.php';

	$banner = ob_get_contents();

	ob_end_clean();

	return $banner;
}
