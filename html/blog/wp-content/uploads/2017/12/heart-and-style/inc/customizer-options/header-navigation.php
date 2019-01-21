<?php

	/**
	 * Header Navigation
	 */

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'typography',
		'settings'    => $prepend . 'navigation_typography',
		'label'       => esc_attr__( 'Typography', 'heart-and-style' ),
		'description' => __( 'Typography options for the top level menu items.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_header_navigation',
		'default'     => array(
			'font-family'    => 'Lato',
			'font-size'      => '12px',
			'font-weight'    => '700',
			'letter-spacing' => '1px',
		),
		'choices'     => array(
			'font-family'    => true,
			'font-size'      => true,
			'font-weight'    => true,
			'letter-spacing' => true,
		),
		'output' => array(
			array(
				'element' => '#navigation .menu > li > a,#navigation .menu ul li a',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '#navigation .menu > li > a,#navigation .menu ul li a',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'navigation_color',
		'label'       => __( 'Color', 'heart-and-style' ),
		'description' => __( 'Text color of the top level menu items.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_header_navigation',
		'default'     => '#ffffff',
		'output' => array(
			array(
				'element'  => '#navigation .menu > li > a',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '#navigation .menu > li > a',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'navigation_color_hover',
		'label'       => __( 'Color - Hover', 'heart-and-style' ),
		'description' => __( 'Text color of the top level menu items when hovered.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_header_navigation',
		'default'     => '#ffffff',
		'output' => array(
			array(
				'element'  => '#navigation .menu > li > a:hover',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '#navigation .menu > li > a:hover',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'navigation_color_active',
		'label'       => __( 'Color - Active', 'heart-and-style' ),
		'description' => __( 'Text color of the top level menu items when active.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_header_navigation',
		'default'     => '#ffffff',
		'output' => array(
			array(
				'element'  => '#navigation .menu > li.current-menu-item > a',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '#navigation .menu > li.current-menu-item > a',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'navigation_border_color_hover',
		'label'       => __( 'Border Color - Hover', 'heart-and-style' ),
		'description' => __( 'Border color of the top level menu items when hovered.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_header_navigation',
		'default'     => '#ed6260',
		'output' => array(
			array(
				'element'  => '#navigation .menu > li > a:hover',
				'property' => 'border-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '#navigation .menu > li > a:hover',
				'property' => 'border-color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'navigation_border_color_active',
		'label'       => __( 'Border Color - Active', 'heart-and-style' ),
		'description' => __( 'Border color of the top level menu items when active.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_header_navigation',
		'default'     => '#ed6260',
		'output' => array(
			array(
				'element'  => '#navigation .menu > li.current-menu-item > a',
				'property' => 'border-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '#navigation .menu > li.current-menu-item > a',
				'property' => 'border-color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'navigation_sub_bg_color',
		'label'       => __( 'Submenu - BG Color', 'heart-and-style' ),
		'description' => __( 'Background color for submenus.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_header_navigation',
		'default'     => '#2a2a2a',
		'output' => array(
			array(
				'element'  => '#navigation .menu ul',
				'property' => 'background-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '#navigation .menu ul',
				'property' => 'background-color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'navigation_sub_border_color',
		'label'       => __( 'Submenu - Border Color', 'heart-and-style' ),
		'description' => __( 'Border color for submenus.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_header_navigation',
		'default'     => '#404040',
		'output' => array(
			array(
				'element'  => '#navigation .menu ul,#navigation .menu ul li a',
				'property' => 'border-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '#navigation .menu ul,#navigation .menu ul li a',
				'property' => 'border-color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'navigation_sub_color',
		'label'       => __( 'Submenu - Color', 'heart-and-style' ),
		'description' => __( 'Text color of the submenu items.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_header_navigation',
		'default'     => '#686868',
		'output' => array(
			array(
				'element'  => '#navigation .menu ul li a',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '#navigation .menu ul li a',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'navigation_sub_color_hover',
		'label'       => __( 'Submenu - Color - Hover', 'heart-and-style' ),
		'description' => __( 'Text color of the submenu items when hovered.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_header_navigation',
		'default'     => '#ffffff',
		'output' => array(
			array(
				'element'  => '#navigation .menu ul li a:hover',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '#navigation .menu ul li a:hover',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'navigation_sub_color_active',
		'label'       => __( 'Submenu - Color - Active', 'heart-and-style' ),
		'description' => __( 'Text color of the submenu items when active.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_header_navigation',
		'default'     => '#ffffff',
		'output' => array(
			array(
				'element'  => '#navigation .menu ul li.current-menu-item > a',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '#navigation .menu ul li.current-menu-item > a',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );