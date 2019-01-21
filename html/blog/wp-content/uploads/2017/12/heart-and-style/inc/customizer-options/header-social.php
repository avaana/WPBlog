<?php

	/**
	 * Header Social
	 */

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'header_social_color',
		'label'       => __( 'Color - Icons', 'heart-and-style' ),
		'description' => __( 'Text color of the icons.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_header_social',
		'default'     => '#ffffff',
		'output' => array(
			array(
				'element'  => '#header-social a,.header-search-mobile-nav-hook',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '#header-social a,.header-search-mobile-nav-hook',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'header_social_color_sep',
		'label'       => __( 'Color - Separator', 'heart-and-style' ),
		'description' => __( 'Color of the vertical separator.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_header_social',
		'default'     => '#adadad',
		'output' => array(
			array(
				'element'  => '.header-social-sep',
				'property' => 'border-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '.header-social-sep',
				'property' => 'border-color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'header_social_search_bg_color',
		'label'       => __( 'Search - BG Color', 'heart-and-style' ),
		'description' => __( 'Background color of the search form.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_header_social',
		'default'     => '#434343',
		'output' => array(
			array(
				'element'  => '.header-search input[type="text"]',
				'property' => 'background-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '.header-search input[type="text"]',
				'property' => 'background-color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'header_social_search_color',
		'label'       => __( 'Search - Color', 'heart-and-style' ),
		'description' => __( 'Text color of the search form.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_header_social',
		'default'     => '#ffffff',
		'output' => array(
			array(
				'element'  => '.header-search input[type="text"],.header-search-placeholder',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '.header-search input[type="text"],.header-search-placeholder',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'header_social_search_close_color',
		'label'       => __( 'Search Close Icon - Color', 'heart-and-style' ),
		'description' => __( 'Text color of the search form.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_header_social',
		'default'     => '#dddddd',
		'output' => array(
			array(
				'element'  => '.header-search-hook-hide',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '.header-search-hook-hide',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );