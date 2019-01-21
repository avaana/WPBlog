<?php

	/**
	 * Blog Button
	 */

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'typography',
		'settings'    => $prepend . 'blog_post_button_typography',
		'label'       => esc_attr__( 'Typography', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_blog_post_button',
		'default'     => array(
			'font-family'    => 'Lato',
			'font-size'      => '11px',
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
				'element' => '.blog-post-read-more a',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'spacing',
		'settings'    => $prepend . 'blog_post_button_spacing',
		'label'       => esc_attr__( 'Spacing', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_blog_post_button',
		'default'     => array(
			'top'       => '0',
			'bottom'    => '37px',
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
				'element' => '.blog-post-read-more',
				'property' => 'margin'
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'blog_post_button_color',
		'label'       => __( 'Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_blog_post_button',
		'default'     => '#fff',
		'output' => array(
			array(
				'element' => '.blog-post-read-more a',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '.blog-post-read-more a',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'blog_post_button_color_hover',
		'label'       => __( 'Color - Hover', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_blog_post_button',
		'default'     => '#fff',
		'output' => array(
			array(
				'element' => '.blog-post-read-more a:hover',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '.blog-post-read-more a:hover',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'blog_post_button_bg_color',
		'label'       => __( 'BG Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_blog_post_button',
		'default'     => '#111',
		'output' => array(
			array(
				'element' => '.blog-post-read-more a',
				'property' => 'background-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '.blog-post-read-more a',
				'property' => 'background-color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'blog_post_button_bg_color_hover',
		'label'       => __( 'BG Color - Hover', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_blog_post_button',
		'default'     => '#424242',
		'output' => array(
			array(
				'element' => '.blog-post-read-more a:hover',
				'property' => 'background-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '.blog-post-read-more a:hover',
				'property' => 'background-color',
				'function' => 'css',
			),
		),
	) );