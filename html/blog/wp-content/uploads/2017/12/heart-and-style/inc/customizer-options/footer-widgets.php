<?php

	/**
	 * Footer Widgets
	 */

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'select',
		'settings'    => $prepend . 'footer_widgets_state',
		'label'       => __( 'Enable/Disable', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_footer_widgets',
		'default'     => 'enabled',
		'choices'     => array(
			'enabled' => __( 'Enabled', 'heart-and-style' ),
			'disabled' => __( 'Disabled', 'heart-and-style' ),			
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'footer_widgets_bg_color',
		'label'       => __( 'BG Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_footer_widgets',
		'default'     => '#111',
		'output' => array(
			array(
				'element' => '#footer-widgets',
				'property' => 'background-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '#footer-widgets',
				'property' => 'background-color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'spacing',
		'settings'    => $prepend . 'footer_widgets_padding',
		'label'       => esc_attr__( 'Padding', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_footer_widgets',
		'default'     => array(
			'top'       => '75px',
			'bottom'    => '75px',
		),
		'choices'     => array(
			'top'    => true,
			'bottom'    => true,
		),
		'output' => array(
			array(
				'element' => '#footer-widgets',
				'property' => 'padding'
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'typography',
		'settings'    => $prepend . 'footer_widgets_title_typography',
		'label'       => esc_attr__( 'Title - Typography', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_footer_widgets',
		'default'     => array(
			'font-family'    => 'Lato',
			'font-size'      => '12px',
			'font-weight'    => '900',
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
				'element' => '#footer-widgets .widget-title',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'footer_widgets_color',
		'label'       => __( 'Title - Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_footer_widgets',
		'default'     => '#fff',
		'output' => array(
			array(
				'element' => '#footer-widgets .widget-title',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '#footer-widgets .widget-title',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'footer_widgets_border_color',
		'label'       => __( 'Title - Border Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_footer_widgets',
		'default'     => '#565656',
		'output' => array(
			array(
				'element' => '#footer-widgets .widget-title-line',
				'property' => 'background-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '#footer-widgets .widget-title-line',
				'property' => 'background-color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'typography',
		'settings'    => $prepend . 'footer_widgets_content_typography',
		'label'       => esc_attr__( 'Content - Typography', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_footer_widgets',
		'default'     => array(
			'font-family'    => 'Georgia',
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
				'element' => '#footer-widgets .widget',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'footer_widgets_content_color',
		'label'       => __( 'Content - Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_footer_widgets',
		'default'     => '#b6b6b6',
		'output' => array(
			array(
				'element' => '#footer-widgets .widget',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '#footer-widgets .widget',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'footer_widgets_content_color_a',
		'label'       => __( 'Content - Link - Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_footer_widgets',
		'default'     => '#6ab999',
		'output' => array(
			array(
				'element' => '#footer-widgets a',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '#footer-widgets a',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );