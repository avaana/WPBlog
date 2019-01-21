<?php

	/**
	 * Subscribe subtitle
	 */

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'textarea',
		'settings'    => $prepend . 'subscribe_subtitle_text',
		'label'       => __( 'Text', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_subscribe_subtitle',
		'default'     => 'Best Feminine WordPress themes, Video Tutorials and Freebies.',
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'typography',
		'settings'    => $prepend . 'subscribe_subtitle_typography',
		'label'       => esc_attr__( 'Typography', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_subscribe_subtitle',
		'default'     => array(
			'font-family'    => 'Lato',
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
				'element' => '.subscribe-section-info h5',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'subscribe_subtitle_color',
		'label'       => __( 'Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_subscribe_subtitle',
		'default'     => '#90cec1',
		'output' => array(
			array(
				'element' => '.subscribe-section-info h5',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '.subscribe-section-info h5',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );