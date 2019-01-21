<?php

	/**
	 * Slider Button
	 */

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'select',
		'settings'    => $prepend . 'slider_button_state',
		'label'       => __( 'Enable/Disable', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_slider_button',
		'default'     => 'enabled',
		'choices'     => array(
			'enabled' => __( 'Enabled', 'heart-and-style' ),
			'disabled' => __( 'Disabled', 'heart-and-style' ),			
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'typography',
		'settings'    => $prepend . 'slider_button_typography',
		'label'       => esc_attr__( 'Typography', 'heart-and-style' ),
		'description' => __( 'Typography options for the button element.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_slider_button',
		'default'     => array(
			'font-family'    => 'Lato',
			'font-size'      => '11px',
			'font-weight'    => '900',
			'letter-spacing' => '4px',
		),
		'choices'     => array(
			'font-family'    => true,
			'font-size'      => true,
			'font-weight'    => true,
			'letter-spacing' => true,
		),
		'output' => array(
			array(
				'element' => '.blog-post-slider-read-more a',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'spacing',
		'settings'    => $prepend . 'slider_button_spacing',
		'label'       => esc_attr__( 'Padding', 'heart-and-style' ),
		'description' => __( 'Padding options for the button element.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_slider_button',
		'default'     => array(
			'top'       => '14px',
			'bottom'    => '14px',
			'left'       => '15px',
			'right'    => '15px',
		),
		'choices'     => array(
			'top'    => true,
			'bottom'    => true,
			'left'    => true,
			'right'    => true,
		),
		'output' => array(
			array(
				'element' => '.blog-post-slider-read-more a',
				'property' => 'padding'
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'slider_button_color',
		'label'       => __( 'Color', 'heart-and-style' ),
		'description' => __( 'Text color of the button text.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_slider_button',
		'default'     => '#fff',
		'output' => array(
			array(
				'element' => '.blog-post-slider-read-more a',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '.blog-post-slider-read-more a',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'slider_button_color_hover',
		'label'       => __( 'Color - Hover', 'heart-and-style' ),
		'description' => __( 'Text color of the button text when hovered.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_slider_button',
		'default'     => '#2c2c2c',
		'output' => array(
			array(
				'element' => '.blog-post-slider-read-more a:hover',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '.blog-post-slider-read-more a:hover',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'slider',
		'settings'    => $prepend . 'slider_button_border_width',
		'label'       => esc_attr__( 'Border Width', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_slider_button',
		'default'     => '1',
		'output'      => array(
			array(
				'element'  => '.blog-post-slider-read-more a',
				'property' => 'border-width',
				'units'    => 'px',
			),
		),
		'choices'      => array(
			'min'  => 0,
			'max'  => 20,
			'step' => 1,
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '.blog-post-slider-read-more a',
				'property' => 'border-width',
				'units'    => 'px',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'slider',
		'settings'    => $prepend . 'slider_button_border_radius',
		'label'       => esc_attr__( 'Border Radius', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_slider_button',
		'default'     => '0',
		'output'      => array(
			array(
				'element'  => '.blog-post-slider-read-more a',
				'property' => 'border-radius',
				'units'    => 'px',
			),
		),
		'choices'      => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '.blog-post-slider-read-more a',
				'property' => 'border-radius',
				'units'    => 'px',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'slider_button_border_color_hover',
		'label'       => __( 'Border Color', 'heart-and-style' ),
		'description' => __( 'Border color of the button text when hovered.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_slider_button',
		'default'     => '#fff',
		'output' => array(
			array(
				'element' => '.blog-post-slider-read-more a',
				'property' => 'border-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '.blog-post-slider-read-more a',
				'property' => 'border-color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'slider_button_bg_color_hover',
		'label'       => __( 'BG Color - Hover', 'heart-and-style' ),
		'description' => __( 'BG color of the button when hovered.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_slider_button',
		'default'     => '#fff',
		'output' => array(
			array(
				'element' => '.blog-post-slider-read-more a:hover',
				'property' => 'background-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '.blog-post-slider-read-more a:hover',
				'property' => 'background-color',
				'function' => 'css',
			),
		),
	) );