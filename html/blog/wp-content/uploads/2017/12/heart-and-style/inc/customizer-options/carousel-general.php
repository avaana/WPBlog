<?php

	/**
	 * carousel Title
	 */

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'select',
		'settings'    => $prepend . 'carousel_state',
		'label'       => __( 'Enable/Disable', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_carousel_general',
		'default'     => 'enabled',
		'choices'     => array(
			'enabled' => __( 'Enabled', 'heart-and-style' ),
			'disabled' => __( 'Disabled', 'heart-and-style' ),			
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'text',
		'settings'    => $prepend . 'carousel_posts_amount',
		'label'       => __( 'Amount of Posts', 'heart-and-style' ),
		'description'       => __( 'The amount of posts to load for the carousel. If set to -1 it will load all posts, if set to less than 4 it will behave like a featured section ( not a carousel ).', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_carousel_general',
		'default'     => '-1',
	) );