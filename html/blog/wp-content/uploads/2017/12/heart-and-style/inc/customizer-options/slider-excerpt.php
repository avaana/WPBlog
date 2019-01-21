<?php

	/**
	 * Slider Excerpt
	 */

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'select',
		'settings'    => $prepend . 'slider_excerpt_state',
		'label'       => __( 'Enable/Disable', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_slider_excerpt',
		'default'     => 'enabled',
		'choices'     => array(
			'enabled' => __( 'Enabled', 'heart-and-style' ),
			'disabled' => __( 'Disabled', 'heart-and-style' ),			
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'typography',
		'settings'    => $prepend . 'slider_excerpt_typography',
		'label'       => esc_attr__( 'Typography', 'heart-and-style' ),
		'description' => __( 'Typography options for the excerpt element.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_slider_excerpt',
		'default'     => array(
			'font-family'    => 'Georgia',
			'font-size'      => '16px',
			'font-weight'    => '700',
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
				'element' => '.blog-post-slider-excerpt',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'spacing',
		'settings'    => $prepend . 'slider_excerpt_spacing',
		'label'       => esc_attr__( 'Spacing', 'heart-and-style' ),
		'description' => __( 'Spacing options for the excerpt element.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_slider_excerpt',
		'default'     => array(
			'top'       => '0',
			'bottom'    => '22px',
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
				'element' => '.blog-post-slider-excerpt',
				'property' => 'margin'
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'slider_excerpt_color',
		'label'       => __( 'Color', 'heart-and-style' ),
		'description' => __( 'Text color of the excerpt.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_slider_excerpt',
		'default'     => '#fff',
		'output' => array(
			array(
				'element' => '.blog-post-slider-excerpt',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '.blog-post-slider-excerpt',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );