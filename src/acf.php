<?php
/**
 * Initialises the plugin requriements.
 *
 * @package ShutterstockAudioWidget
 */

namespace SeagynDavis\ShutterstockAudioWidget\ACF;

\acf_add_local_field_group(
	array(
		'key'                   => 'group_5dc86ce168c24',
		'title'                 => 'Shutterstock Audio Widgets',
		'fields'                => array(
			array(
				'key'               => 'songs',
				'label'             => 'Songs',
				'name'              => 'songs',
				'type'              => 'repeater',
				'instructions'      => 'Enter the URL(s) to the audio on Shutterstock that you\'d like to refer.',
				'required'          => 1,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'show_in_graphql'   => 1,
				'collapsed'         => '',
				'min'               => 0,
				'max'               => 0,
				'layout'            => 'block',
				'button_label'      => '',
				'sub_fields'        => array(
					array(
						'key'               => 'url',
						'label'             => 'URL',
						'name'              => 'url',
						'type'              => 'url',
						'instructions'      => '',
						'required'          => 1,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'show_in_graphql'   => 1,
						'default_value'     => '',
						'placeholder'       => '',
					),
					array(
						'key'               => 'title',
						'label'             => 'Title',
						'name'              => 'title',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'show_in_graphql'   => 1,
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					),
					array(
						'key'               => 'preview_mp3',
						'label'             => 'Preview MP3',
						'name'              => 'preview_mp3',
						'type'              => 'url',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'show_in_graphql'   => 1,
						'default_value'     => '',
						'placeholder'       => '',
					),
					array(
						'key'               => 'preview_ogg',
						'label'             => 'Preview OGG',
						'name'              => 'preview_ogg',
						'type'              => 'url',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'show_in_graphql'   => 1,
						'default_value'     => '',
						'placeholder'       => '',
					),
					array(
						'key'               => 'artist',
						'label'             => 'Artist',
						'name'              => 'artist',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'show_in_graphql'   => 1,
						'default_value'     => '',
						'placeholder'       => '',
					),
					array(
						'key'               => 'waveform',
						'label'             => 'Waveform',
						'name'              => 'waveform',
						'type'              => 'url',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'show_in_graphql'   => 1,
						'default_value'     => '',
						'placeholder'       => '',
					),
				),
			),
		),
		'location'              => array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'audio_widget',
				),
			),
		),
		'menu_order'            => 0,
		'position'              => 'acf_after_title',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen'        => '',
		'active'                => true,
		'description'           => '',
		'show_in_graphql'       => 1,
		'graphql_field_name'    => 'data',
	)
);
