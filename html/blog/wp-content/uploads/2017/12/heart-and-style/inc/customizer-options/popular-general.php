<?php

	/**
	 * Popular General
	 */

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'select',
		'settings'    => $prepend . 'popular_posts_state',
		'label'       => __( 'Enable/Disable', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_popular_general',
		'default'     => 'enabled',
		'choices'     => array(
			'enabled' => __( 'Enabled', 'heart-and-style' ),
			'disabled' => __( 'Disabled', 'heart-and-style' ),			
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'text',
		'settings'    => $prepend . 'popular_posts_amount',
		'label'       => __( 'Amount of Posts', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_popular_general',
		'default'     => '4',
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'popular_posts_bg_color',
		'label'       => __( 'BG Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_popular_general',
		'default'     => '#f3f3f3',
		'output' => array(
			array(
				'element' => '#footer-posts',
				'property' => 'background-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '#footer-posts',
				'property' => 'background-color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'spacing',
		'settings'    => $prepend . 'popular_posts_padding',
		'label'       => esc_attr__( 'Padding', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_popular_general',
		'default'     => array(
			'top'       => '50px',
			'bottom'    => '50px',
		),
		'choices'     => array(
			'top'    => true,
			'bottom'    => true,
		),
		'output' => array(
			array(
				'element' => '#footer-posts',
				'property' => 'padding'
			),
		),
	) );