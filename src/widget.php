<?php
/**
 * Displays the banner via a widget.
 *
 * @package SouthAfricaCovid19Banner
 */

namespace SeagynDavis\SouthAfricaCovid19Banner\Widget;

/**
 * Creates a banner widget
 */
class Banner extends \WP_Widget {
	/**
	 * Set up widget.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct(
			'south-african-covid-19-banner-widget',
			'South African Covid-19 Banner'
		);
	}

	/**
	 * Output of widget.
	 *
	 * @param array $args Array of arguments for the widget.
	 * @param array $instance Array of instance specific data.
	 *
	 * @return void
	 */
	public function widget( $args, $instance ) {
		\wp_enqueue_style( 'south-african-covid-19-banner', SOUTH_AFRICA_COVID_19_BANNER_URL . 'resources/css/south-african-covid-19-banner.min.css', null, SOUTH_AFRICA_COVID_19_BANNER_VERSION, false );

		echo $args['before_widget'];

		require 'html/banner.php';

		echo $args['after_widget'];
	}
}
