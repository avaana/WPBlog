<?php

	/**
	 * Tagline Title
	 */

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'typography',
		'settings'    => $prepend . 'tagline_description_typography',
		'label'       => esc_attr__( 'Typography', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_tagline_description',
		'default'     => array(
			'font-family'    => 'Georgia',
			'font-size'      => '16px',
			'font-weight'    => '700',
			'letter-spacing' => '0px',
		),
		'choices'     => array(
			'font-family'    => true,
			'font-size'      => true,
			'font-weight'    => true,
			'letter-spacing' => true,
		),
		'output' => array(
			array(
				'element' => '#tagline h4',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'spacing',
		'settings'    => $prepend . 'tagline_description_spacing',
		'label'       => esc_attr__( 'Spacing', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_tagline_description',
		'default'     => array(
			'top'       => '30px',
			'bottom'    => '0',
			'left'       => '0',
			'right'    => '0',
		),
		'choices'     => array(
			'top'    => true,
			'bottom'    => true,
			'left'    => true,
			'right'    => true,
		),
		'output' => array(
			array(
				'element' => '#tagline h4',
				'property' => 'margin'
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'tagline_description_color',
		'label'       => __( 'Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_tagline_description',
		'default'     => '#fff',
		'output' => array(
			array(
				'element' => '#tagline h4',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '#tagline h4',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );