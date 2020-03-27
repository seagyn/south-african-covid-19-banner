<?php
/**
 * Displays the custom audio player.
 *
 * @package ShutterstockAudioWidget
 */

namespace SeagynDavis\ShutterstockAudioWidget\Display;

/**
 * Register a custom post type called "audio_widget".
 *
 * @param array $atts Array of shortcode attributes.
 *
 * @return array Song data to save.
 */
function shortcode( $atts ) {
	$atts = shortcode_atts(
		array(
			'widget' => '',
		),
		$atts,
		'shutterstock-audio-widget'
	);

	if ( '' === $atts['widget'] ) {
		return 'Please set a widget slug.';
	}

	\wp_enqueue_script( 'shutterstock-audio-widget', SHUTTERSTOCK_AUDIO_WIDGET_URL . 'resources/js/shutterstock-audio-widget.js', [ 'wp-api-fetch' ], filemtime( SHUTTERSTOCK_AUDIO_WIDGET_DIR . 'resources/css/shutterstock-audio-widget.css' ), true );
	wp_localize_script(
		'shutterstock-audio-widget',
		'shutterStockAudioWidget',
		[
			'buyNow' => pll__( 'Buy Now', 'shutterstock-audio-widget' ),
			'widget' => $atts['widget'],
		]
	);
	\wp_enqueue_style( 'shutterstock-audio-widget', SHUTTERSTOCK_AUDIO_WIDGET_URL . 'resources/css/shutterstock-audio-widget.css', null, filemtime( SHUTTERSTOCK_AUDIO_WIDGET_DIR . 'resources/css/shutterstock-audio-widget.css' ), false );

	return '<div id="shutterstock-audio-widget"></div>';
}
