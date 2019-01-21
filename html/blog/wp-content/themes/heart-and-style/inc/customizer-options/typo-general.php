<?php

	/**
	 * General Typography
	 */

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'typography',
		'settings'    => $prepend . 'typography_general_typo',
		'label'       => esc_attr__( 'Typography', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_typography_general',
		'default'     => array(
			'font-family'    => 'Georgia',
			'font-size'      => '15px',
			'font-weight'    => '400',
			'letter-spacing' => '0',
		),
		'choices'     => array(
			'font-family'    => true,
			'font-size'      => true,
			'font-weight'    => true,
			'letter-spacing' => true,
		),
		'output' => array(
			array(
				'element' => 'body,button,input,select,textarea',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'typography_general_color',
		'label'       => __( 'Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_typography_general',
		'default'     => '#6b6b6b',
		'output' => array(
			array(
				'element' => 'body,button,input,select,textarea',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => 'body,button,input,select,textarea',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'typography_general_link_color',
		'label'       => __( 'Link - Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_typography_general',
		'default'     => '#ed6260',
		'output' => array(
			array(
				'element' => 'a',
				'property' => 'color',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'typography_general_link_color_hover',
		'label'       => __( 'Link - Color - Hover', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_typography_general',
		'default'     => '#ed6260',
		'output' => array(
			array(
				'element' => '.single-content a:hover',
				'property' => 'color',
			),
		),
	) );