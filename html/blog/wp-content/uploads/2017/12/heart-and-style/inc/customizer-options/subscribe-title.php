<?php

	/**
	 * Subscribe title
	 */

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'textarea',
		'settings'    => $prepend . 'subscribe_title_text',
		'label'       => __( 'Text', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_subscribe_title',
		'default'     => 'Don\'t Miss Out, Subscribe to the Newsletter!',
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'typography',
		'settings'    => $prepend . 'subscribe_title_typography',
		'label'       => esc_attr__( 'Typography', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_subscribe_title',
		'default'     => array(
			'font-family'    => 'Old Standard TT',
			'font-size'      => '22px',
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
				'element' => '.subscribe-section-info h4',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'spacing',
		'settings'    => $prepend . 'subscribe_title_spacing',
		'label'       => esc_attr__( 'Spacing', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_subscribe_title',
		'default'     => array(
			'top'       => '0',
			'bottom'    => '4px',
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
				'element' => '.subscribe-section-info h4',
				'property' => 'margin'
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'subscribe_title_color',
		'label'       => __( 'Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_subscribe_title',
		'default'     => '#fff',
		'output' => array(
			array(
				'element' => '.subscribe-section-info h4',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '.subscribe-section-info h4',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );