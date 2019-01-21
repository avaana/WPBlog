<?php

	/**
	 * Featured General
	 */

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'select',
		'settings'    => $prepend . 'featured_posts_state',
		'label'       => __( 'Enable/Disable', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_featured_general',
		'default'     => 'enabled',
		'choices'     => array(
			'enabled' => __( 'Enabled', 'heart-and-style' ),
			'disabled' => __( 'Disabled', 'heart-and-style' ),			
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'featured_posts_bg_color',
		'label'       => __( 'BG Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_featured_general',
		'default'     => '#fff',
		'output' => array(
			array(
				'element' => '#header-posts',
				'property' => 'background-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '#header-posts',
				'property' => 'background-color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'spacing',
		'settings'    => $prepend . 'featured_posts_padding',
		'label'       => esc_attr__( 'Padding', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_featured_general',
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
				'element' => '#header-posts',
				'property' => 'padding'
			),
		),
	) );