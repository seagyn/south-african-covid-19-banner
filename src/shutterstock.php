<?php
/**
 * Initialises the plugin requriements.
 *
 * @package ShutterstockAudioWidget
 */

namespace SeagynDavis\ShutterstockAudioWidget\Shutterstock;

define( 'SHUTTERSTOCK_KEY', '6e018-d60e1-1184c-56b9d-fede2-920fb' );
define( 'SHUTTERSTOCK_SECRET', '20966-90965-5aeb0-15926-fe3ff-0512f' );

/**
 * Register a custom post type called "audio_widget".
 *
 * @param array $songs Array of songs to fetch.
 *
 * @return array Song data to save.
 */
function get_audio( $songs ) {
	foreach ( $songs as &$song_data ) {
		$id   = parse_audio_id( $song_data['url'] );
		$data = fetch_audio_data( $id );
		$song_data = [
			'url' => $song_data['url'],
			'title' => $data->title,
			'preview_mp3' => $data->assets->preview_mp3->url,
			'preview_ogg' => $data->assets->preview_ogg->url,
			'waveform' => $data->assets->waveform->url,
			'artist' => $data->artists[0]->name,
		];
	}

	return $songs;
}

/**
 * Register a custom post type called "audio_widget".
 *
 * @param string $url URL of audio to fetch.
 *
 * @return int Shutterstock audio id.
 */
function parse_audio_id( $url ) {
	if ( preg_match( '/^https:\/\/www.shutterstock.com\/(?:(?:es|fr)\/)*music\/[a-z\-]*([0-9]*)[a-z0-9\%\-]*$/', $url, $matches ) ) {
		return $matches[1];
	}
	return null;
}

/**
 * Register a custom post type called "audio_widget".
 *
 * @param int $id Id of audio to fetch from Shutterstock.
 *
 * @return object Object of audio data from Shutterstock.
 */
function fetch_audio_data( $id ) {
	$response = \wp_remote_get(
		"https://api.shutterstock.com/v2/audio/{$id}?view=full",
		[
			'headers' => [
				'Authorization' => 'Basic ' . base64_encode( SHUTTERSTOCK_KEY . ':' . SHUTTERSTOCK_SECRET ),
				'Content-Type'  => 'application/json',
			],
		]
	);

	if ( is_array( $response ) && ! is_wp_error( $response ) ) {
		$body = json_decode( $response['body'] );

		return $body;
	}

	return null;
}
