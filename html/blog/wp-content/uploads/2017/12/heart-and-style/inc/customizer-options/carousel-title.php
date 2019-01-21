<?php

	/**
	 * Carousel Title
	 */

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'select',
		'settings'    => $prepend . 'carousel_title_state',
		'label'       => __( 'Enable/Disable', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_carousel_title',
		'default'     => 'enabled',
		'choices'     => array(
			'enabled' => __( 'Enabled', 'heart-and-style' ),
			'disabled' => __( 'Disabled', 'heart-and-style' ),			
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'typography',
		'settings'    => $prepend . 'carousel_title_typography',
		'label'       => esc_attr__( 'Typography', 'heart-and-style' ),
		'description' => __( 'Typography options for the title element.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_carousel_title',
		'default'     => array(
			'font-family'    => 'Arbutus Slab',
			'font-size'      => '26px',
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
				'element' => '.blog-post-carousel-front h4',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'spacing',
		'settings'    => $prepend . 'carousel_title_spacing',
		'label'       => esc_attr__( 'Spacing', 'heart-and-style' ),
		'description' => __( 'Spacing options for the title element.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_carousel_title',
		'default'     => array(
			'top'       => '0',
			'bottom'    => '18px',
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
				'element' => '.blog-post-carousel-front h4',
				'property' => 'margin'
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'carousel_title_color',
		'label'       => __( 'Color', 'heart-and-style' ),
		'description' => __( 'Text color of the title.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_carousel_title',
		'default'     => '#fff',
		'output' => array(
			array(
				'element' => '.blog-post-carousel-front h4',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '.blog-post-carousel-front h4',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );