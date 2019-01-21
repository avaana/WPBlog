<?php

	/**
	 * Blog Pagination
	 */

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'typography',
		'settings'    => $prepend . 'blog_post_pagination_typography',
		'label'       => esc_attr__( 'Typography', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_blog_post_pagination',
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
				'element' => '.pagination-load-more a',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'spacing',
		'settings'    => $prepend . 'blog_post_pagination_spacing',
		'label'       => esc_attr__( 'Spacing', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_blog_post_pagination',
		'default'     => array(
			'top'       => '50px',
			'bottom'    => '0',
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
				'element' => '.pagination',
				'property' => 'margin'
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'blog_post_pagination_color',
		'label'       => __( 'Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_blog_post_pagination',
		'default'     => '#fff',
		'output' => array(
			array(
				'element' => '.pagination-load-more a',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '.pagination-load-more a',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'blog_post_pagination_bg_color',
		'label'       => __( 'BG Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_blog_post_pagination',
		'default'     => '#ee6c6b',
		'output' => array(
			array(
				'element' => '.pagination-load-more a',
				'property' => 'background-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '.pagination-load-more a',
				'property' => 'background-color',
				'function' => 'css',
			),
		),
	) );