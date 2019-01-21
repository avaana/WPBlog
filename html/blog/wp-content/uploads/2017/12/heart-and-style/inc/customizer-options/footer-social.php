<?php

	/**
	 * Footer Social
	 */

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'select',
		'settings'    => $prepend . 'footer_top_state',
		'label'       => __( 'Enable/Disable', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_footer_social',
		'default'     => 'enabled',
		'choices'     => array(
			'enabled' => __( 'Enabled', 'heart-and-style' ),
			'disabled' => __( 'Disabled', 'heart-and-style' ),			
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'footer_social_bg_color',
		'label'       => __( 'BG Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_footer_social',
		'default'     => '#fff',
		'output' => array(
			array(
				'element' => '#footer-top',
				'property' => 'background-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '#footer-top',
				'property' => 'background-color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'spacing',
		'settings'    => $prepend . 'footer_social_padding',
		'label'       => esc_attr__( 'Padding', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_footer_social',
		'default'     => array(
			'top'       => '40px',
			'bottom'    => '40px',
		),
		'choices'     => array(
			'top'    => true,
			'bottom'    => true,
		),
		'output' => array(
			array(
				'element' => '#footer-top',
				'property' => 'padding'
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'typography',
		'settings'    => $prepend . 'footer_social_typography',
		'label'       => esc_attr__( 'Typography', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_footer_social',
		'default'     => array(
			'font-family'    => 'Lato',
			'font-size'      => '11px',
			'font-weight'    => '700',
			'letter-spacing' => '2px',
		),
		'choices'     => array(
			'font-family'    => true,
			'font-size'      => true,
			'font-weight'    => true,
			'letter-spacing' => true,
		),
		'output' => array(
			array(
				'element' => '.social-links-w-labels a,.scroll-to-top',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'footer_social_color',
		'label'       => __( 'Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_footer_social',
		'default'     => '#999',
		'output' => array(
			array(
				'element' => '.social-links-w-labels a,.scroll-to-top',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '.social-links-w-labels a,.scroll-to-top',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'footer_social_icon_color',
		'label'       => __( 'Icon Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_footer_social',
		'default'     => '#232323',
		'output' => array(
			array(
				'element' => '.social-links-w-labels .fa,.scroll-to-top .fa',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '.social-links-w-labels .fa,.scroll-to-top .fa',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );