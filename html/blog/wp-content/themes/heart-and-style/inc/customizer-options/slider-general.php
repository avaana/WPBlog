<?php

	/**
	 * Slider Title
	 */

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'select',
		'settings'    => $prepend . 'slider_state',
		'label'       => __( 'Enable/Disable', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_slider_general',
		'default'     => 'disabled',
		'choices'     => array(
			'enabled' => __( 'Enabled', 'heart-and-style' ),
			'disabled' => __( 'Disabled', 'heart-and-style' ),			
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'text',
		'settings'    => $prepend . 'slider_posts_amount',
		'label'       => __( 'Amount of Posts', 'heart-and-style' ),
		'description'       => __( 'The amount of posts to load for the slider. If set to -1 it will load all posts, if set to 1 it will behave like a featured section ( not a slider ), if set to 2 or more it will be a slider.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_slider_general',
		'default'     => '-1',
	) );