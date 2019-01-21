<?php

	/**
	 * Header Logo
	 */

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'select',
		'settings'    => $prepend . 'logo_position',
		'label'       => esc_attr__( 'Logo Position', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_header_logo',
		'default'     => 'inline_left',
		'priority'    => 10,
		'choices'     => array(
			'inline_center'  => esc_attr__( 'Inline Center', 'heart-and-style' ),
			'inline_left'    => esc_attr__( 'Inline Left', 'heart-and-style' ),
			'below_center'   => esc_attr__( 'Below', 'heart-and-style' ),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'image',
		'settings'    => $prepend . 'logo',
		'label'       => esc_attr__( 'Logo', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_header_logo',
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'image',
		'settings'    => $prepend . 'logo_retina',
		'label'       => esc_attr__( 'Logo - Retina', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_header_logo',
	) );


	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'spacing',
		'settings'    => $prepend . 'logo_padding',
		'label'       => esc_attr__( 'Padding', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_header_logo',
		'default'     => array(
			'top'       => '25px',
			'bottom'    => '0',
		),
		'choices'     => array(
			'top'    => true,
			'bottom'    => true,
		),
		'output' => array(
			array(
				'element' => '#logo',
				'property' => 'padding',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '#logo',
				'property' => 'padding',
				'function' => 'css',
			),
		),
	) );