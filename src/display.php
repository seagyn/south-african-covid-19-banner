<?php
/**
 * Displays a banner across the website.
 *
 * @package SouthAfricaCovid19Banner
 */

namespace SeagynDavis\SouthAfricaCovid19Banner\BannerDisplay;

/**
 * Displays the page banner according to settings.
 */
function banner_display() {
	$options = get_option( 'sac19b_options' );

	if ( ! empty( $options['position'] ) ) {
		\wp_enqueue_style(
			'south-african-covid-19-page-banner',
			SOUTH_AFRICA_COVID_19_BANNER_URL . 'resources/css/south-african-covid-19-page-banner.css',
			null,
			SOUTH_AFRICA_COVID_19_BANNER_VERSION
		);

		include_once 'html/page-banner.php';
	}
}
