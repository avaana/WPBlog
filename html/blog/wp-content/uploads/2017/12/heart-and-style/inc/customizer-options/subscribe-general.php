<?php
	
	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'select',
		'settings'    => $prepend . 'subscribe_state',
		'label'       => __( 'Enable/Disable', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_subscribe_general',
		'default'     => 'enabled',
		'choices'     => array(
			'enabled' => __( 'Enabled', 'heart-and-style' ),
			'disabled' => __( 'Disabled', 'heart-and-style' ),			
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'code',
		'settings'    => $prepend . 'subscribe_shortcode',
		'label'       => __( 'Shortcode', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_subscribe_general',
		'default'     => '[wysija_form id="1"]',
		 'choices'     => array(
			'language' => 'html',
			'theme'    => 'monokai',
			'height'   => 250,
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'subscribe_bg_color',
		'label'       => __( 'BG Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_subscribe_general',
		'default'     => '#15987c',
		'output' => array(
			array(
				'element' => '.subscribe-section',
				'property' => 'background-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '.subscribe-section',
				'property' => 'background-color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'subscribe_border_color',
		'label'       => __( 'Border Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_subscribe_general',
		'default'     => '#56b5a1',
		'output' => array(
			array(
				'element' => '.subscribe-section-inner',
				'property' => 'border-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '.subscribe-section-inner',
				'property' => 'border-color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'spacing',
		'settings'    => $prepend . 'subscribe_padding',
		'label'       => esc_attr__( 'Padding', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_subscribe_general',
		'default'     => array(
			'top'       => '9px',
			'bottom'    => '9px',
			'left' 		=> '9px',
			'right' 	=> '9px',
		),
		'choices'     => array(
			'top'    => true,
			'bottom' => true,
			'left'   => true,
			'right'  => true,
		),
		'output' => array(
			array(
				'element' => '.subscribe-section',
				'property' => 'padding'
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'spacing',
		'settings'    => $prepend . 'subscribe_padding_inner',
		'label'       => esc_attr__( 'Padding Inner', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_subscribe_general',
		'default'     => array(
			'top'       => '23px',
			'bottom'    => '23px',
			'left' 		=> '23px',
			'right' 	=> '23px',
		),
		'choices'     => array(
			'top'    => true,
			'bottom' => true,
			'left'   => true,
			'right'  => true,
		),
		'output' => array(
			array(
				'element' => '.subscribe-section-inner',
				'property' => 'padding'
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'spacing',
		'settings'    => $prepend . 'subscribe_margin',
		'label'       => esc_attr__( 'Margin', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_subscribe_general',
		'default'     => array(
			'top'       => '0px',
			'bottom'    => '0px',
		),
		'choices'     => array(
			'top'    => true,
			'bottom'    => true,
		),
		'output' => array(
			array(
				'element' => '.subscribe-section',
				'property' => 'margin'
			),
		),
	) );