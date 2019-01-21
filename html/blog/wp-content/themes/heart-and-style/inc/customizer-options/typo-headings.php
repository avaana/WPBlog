<?php

	/**
	 * General Typography
	 */

	 Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'typography_headings_color',
		'label'       => __( 'Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_typography_headings',
		'default'     => '#232323',
		'output' => array(
			array(
				'element' => 'h1,h2,h3,h4,h5,h6',
				'property' => 'color',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'typography',
		'settings'    => $prepend . 'typography_headings_h1_typo',
		'label'       => esc_attr__( 'Heading 1', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_typography_headings',
		'default'     => array(
			'font-family'    => 'Georgia',
			'font-size'      => '33px',
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
				'element' => 'h1',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'typography',
		'settings'    => $prepend . 'typography_headings_h2_typo',
		'label'       => esc_attr__( 'Heading 2', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_typography_headings',
		'default'     => array(
			'font-family'    => 'Georgia',
			'font-size'      => '30px',
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
				'element' => 'h2',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'typography',
		'settings'    => $prepend . 'typography_headings_h3_typo',
		'label'       => esc_attr__( 'Heading 3', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_typography_headings',
		'default'     => array(
			'font-family'    => 'Georgia',
			'font-size'      => '27px',
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
				'element' => 'h3',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'typography',
		'settings'    => $prepend . 'typography_headings_h4_typo',
		'label'       => esc_attr__( 'Heading 4', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_typography_headings',
		'default'     => array(
			'font-family'    => 'Georgia',
			'font-size'      => '24px',
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
				'element' => 'h4',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'typography',
		'settings'    => $prepend . 'typography_headings_h5_typo',
		'label'       => esc_attr__( 'Heading 5', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_typography_headings',
		'default'     => array(
			'font-family'    => 'Georgia',
			'font-size'      => '21px',
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
				'element' => 'h5',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'typography',
		'settings'    => $prepend . 'typography_headings_h6_typo',
		'label'       => esc_attr__( 'Heading 6', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_typography_headings',
		'default'     => array(
			'font-family'    => 'Georgia',
			'font-size'      => '18px',
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
				'element' => 'h6',
			),
		),
	) );