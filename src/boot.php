<?php
/**
 * Initialises the plugin requriements.
 *
 * @package ShutterstockAudioWidget
 */

namespace SeagynDavis\ShutterstockAudioWidget;

require_once 'acf.php';
require_once 'post-types.php';
require_once 'display.php';

/**
 * Initialises the app.
 */
function boot() {
	add_action( 'init', 'SeagynDavis\ShutterstockAudioWidget\PostTypes\register' );
	add_action( 'init', __NAMESPACE__ . '\register_translations' );
	add_action( 'acf/save_post', 'SeagynDavis\ShutterstockAudioWidget\PostTypes\save_post', 15 );

	add_shortcode( 'shutterstock-audio-widget', 'SeagynDavis\ShutterstockAudioWidget\Display\shortcode' );
}

/**
 * Register translations
 */
function register_translations() {
	pll_register_string( 'Buy Now', 'Buy Now', 'shutterstock-audio-widget' );
}
