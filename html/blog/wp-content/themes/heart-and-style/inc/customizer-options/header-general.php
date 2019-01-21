<?php

	/**
	 * Header General
	 */

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'header_bg_color',
		'label'       => __( 'BG Color', 'heart-and-style' ),
		'description' => __( 'Background color of the header area.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_header_general',
		'default'     => '#0a0a0a',
		'output' => array(
			array(
				'element'  => '#header',
				'property' => 'background-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '#header',
				'property' => 'background-color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'slider',
		'settings'    => $prepend . 'header_height',
		'label'       => esc_attr__( 'Height', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_header_general',
		'default'     => '70',
		'output'      => array(
			array(
				'element'  => '#header-social a,.header-search-mobile-nav-hook,.header-search-mobile-nav-hook,.header-search-placeholder,#navigation .menu > li > a',
				'property' => 'line-height',
				'units'    => 'px',
			),
			array(
				'element'  => 'body',
				'property' => 'padding-top',
				'units'    => 'px',
			),
		),
		'choices'      => array(
			'min'  => 0,
			'max'  => 200,
			'step' => 1,
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '#header-social a,.header-search-mobile-nav-hook,.header-search-mobile-nav-hook,.header-search-placeholder,#navigation .menu > li > a',
				'property' => 'line-height',
				'units'    => 'px',
				'function' => 'css',
			),
			array(
				'element'  => 'body',
				'property' => 'padding-top',
				'units'    => 'px',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'select',
		'settings'    => $prepend . 'header_drop_shadow',
		'label'       => __( 'Drop Shadow', 'heart-and-style' ),
		'description' => __( 'Enable/Disable shadow below header.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_header_general',
		'default'     => 'enabled',
		'choices'     => array(
			'enabled' => __( 'Enabled', 'heart-and-style' ),
			'disabled' => __( 'Disabled', 'heart-and-style' ),			
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'select',
		'settings'    => $prepend . 'header_sticky_state',
		'label'       => __( 'Sticky Header', 'heart-and-style' ),
		'description' => __( 'Enable/Disable sticky header.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_header_general',
		'default'     => 'enabled',
		'choices'     => array(
			'enabled' => __( 'Enabled', 'heart-and-style' ),
			'disabled' => __( 'Disabled', 'heart-and-style' ),			
		),
	) );