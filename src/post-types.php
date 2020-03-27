<?php
/**
 * Initialises the plugin requriements.
 *
 * @package ShutterstockAudioWidget
 */

namespace SeagynDavis\ShutterstockAudioWidget\PostTypes;

require_once 'shutterstock.php';

/**
 * Register a custom post type called "audio_widget".
 *
 * @see get_post_type_labels() for label keys.
 */
function register() {
	$labels = array(
		'name'                  => _x( 'Shutterstock Audio Widgets', 'Post type general name', 'shutterstock-audio-wiget' ),
		'singular_name'         => _x( 'Shutterstock Audio Widget', 'Post type singular name', 'shutterstock-audio-wiget' ),
		'menu_name'             => _x( 'Shutterstock', 'Admin Menu text', 'shutterstock-audio-wiget' ),
		'name_admin_bar'        => _x( 'Audio Widget', 'Add New on Toolbar', 'shutterstock-audio-wiget' ),
		'add_new'               => __( 'Add New', 'shutterstock-audio-wiget' ),
		'add_new_item'          => __( 'Add New Audio Widget', 'shutterstock-audio-wiget' ),
		'new_item'              => __( 'New Audio Widget', 'shutterstock-audio-wiget' ),
		'edit_item'             => __( 'Edit Audio Widget', 'shutterstock-audio-wiget' ),
		'view_item'             => __( 'View Audio Widget', 'shutterstock-audio-wiget' ),
		'all_items'             => __( 'All Audio Widgets', 'shutterstock-audio-wiget' ),
		'search_items'          => __( 'Search Audio Widgets', 'shutterstock-audio-wiget' ),
		'parent_item_colon'     => __( 'Parent Audio Widgets:', 'shutterstock-audio-wiget' ),
		'not_found'             => __( 'No audio widget found.', 'shutterstock-audio-wiget' ),
		'not_found_in_trash'    => __( 'No audio widget found in Trash.', 'shutterstock-audio-wiget' ),
		'featured_image'        => _x( 'Book Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'shutterstock-audio-wiget' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'shutterstock-audio-wiget' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'shutterstock-audio-wiget' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'shutterstock-audio-wiget' ),
		'archives'              => _x( 'Book archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'shutterstock-audio-wiget' ),
		'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'shutterstock-audio-wiget' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'shutterstock-audio-wiget' ),
		'filter_items_list'     => _x( 'Filter audio widget list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'shutterstock-audio-wiget' ),
		'items_list_navigation' => _x( 'Audio widgets list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'shutterstock-audio-wiget' ),
		'items_list'            => _x( 'Audio widgets list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'shutterstock-audio-wiget' ),
	);

	$args = array(
		'labels'              => $labels,
		'public'              => true,
		'publicly_queryable'  => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'query_var'           => true,
		'rewrite'             => array( 'slug' => 'audio_widgets' ),
		'capability_type'     => 'post',
		'has_archive'         => true,
		'hierarchical'        => false,
		'menu_position'       => null,
		'supports'            => array( 'title' ),
		'menu_icon'           => 'dashicons-format-audio',
		'show_in_rest'        => true,
		'show_in_graphql'     => true,
		'graphql_single_name' => 'ShutterstockAudioWidget',
		'graphql_plural_name' => 'ShutterstockAudioWidgets',
	);

	register_post_type( 'audio_widget', $args );
}

/**
 * Fetch additional data for Shutterstock songs.
 *
 * @param int $post_id Id of the post being saved on.
 */
function save_post( $post_id ) {

	// Bail early if no data sent.
	if ( 'audio_widget' !== $_POST['post_type'] || empty( $_POST['acf'] ) ) {
		return;
  }

	$songs = $_POST['acf']['songs'];

	// Check if a specific value was sent.
	if ( ! empty( $songs ) ) {
		$song_data = \SeagynDavis\ShutterstockAudioWidget\Shutterstock\get_audio( $songs );
		$count     = 1;
		foreach ( $song_data as $data ) {
			var_dump( update_row( 'songs', $count, $data, $post_id ) );
			$count++;
		}
	}
}
