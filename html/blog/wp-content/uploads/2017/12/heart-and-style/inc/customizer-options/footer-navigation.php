<?php

	/**
	 * Footer Bottom
	 */

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'select',
		'settings'    => $prepend . 'footer_bottom_state',
		'label'       => __( 'Enable/Disable', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_footer_navigation',
		'default'     => 'enabled',
		'choices'     => array(
			'enabled' => __( 'Enabled', 'heart-and-style' ),
			'disabled' => __( 'Disabled', 'heart-and-style' ),			
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'footer_navigation_bg_color',
		'label'       => __( 'BG Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_footer_navigation',
		'default'     => '#fff',
		'output' => array(
			array(
				'element' => '#footer-bottom',
				'property' => 'background-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '#footer-bottom',
				'property' => 'background-color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'spacing',
		'settings'    => $prepend . 'footer_navigation_padding',
		'label'       => esc_attr__( 'Padding', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_footer_navigation',
		'default'     => array(
			'top'       => '30px',
			'bottom'    => '30px',
		),
		'choices'     => array(
			'top'    => true,
			'bottom'    => true,
		),
		'output' => array(
			array(
				'element' => '#footer-bottom',
				'property' => 'padding'
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'typography',
		'settings'    => $prepend . 'footer_navigation_typography',
		'label'       => esc_attr__( 'Navigation - Typography', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_footer_navigation',
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
				'element' => '#footer-navigation li a',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'footer_navigation_color',
		'label'       => __( 'Navigation - Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_footer_navigation',
		'default'     => '#999',
		'output' => array(
			array(
				'element' => '#footer-navigation li a',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '#footer-navigation li a',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'footer_navigation_color_hover',
		'label'       => __( 'Navigation - Color - Hover', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_footer_navigation',
		'default'     => '#151515',
		'output' => array(
			array(
				'element' => '#footer-navigation li a:hover',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '#footer-navigation li a:hover',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'footer_navigation_color_active',
		'label'       => __( 'Navigation - Color - Active', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_footer_navigation',
		'default'     => '#151515',
		'output' => array(
			array(
				'element' => '#footer-navigation li.current-menu-item a',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '#footer-navigation li.current-menu-item a',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'textarea',
		'settings'    => $prepend . 'footer_copy_text',
		'label'       => __( 'Copyright - Text', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_footer_navigation',
		'default'     => 'Designed & Developed by <a href="http://meridianthemes.net/" rel="nofollow">MeridianThemes</a>',
		'sanitize_callback' => array( 'Kirki_Sanitize_Values', 'unfiltered' ),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'typography',
		'settings'    => $prepend . 'footer_copy_typography',
		'label'       => esc_attr__( 'Copyright - Typography', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_footer_navigation',
		'default'     => array(
			'font-family'    => 'Georgia',
			'font-size'      => '12px',
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
				'element' => '#footer-copyright',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'footer_copy_color',
		'label'       => __( 'Copyright - Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_footer_navigation',
		'default'     => '#999',
		'output' => array(
			array(
				'element' => '#footer-copyright',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '#footer-copyright',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );