<?php

	/**
	 * Popular Date
	 */

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'select',
		'settings'    => $prepend . 'popular_post_comments_state',
		'label'       => __( 'Enable/Disable', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_popular_comments',
		'default'     => 'enabled',
		'choices'     => array(
			'enabled' => __( 'Enabled', 'heart-and-style' ),
			'disabled' => __( 'Disabled', 'heart-and-style' ),			
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'typography',
		'settings'    => $prepend . 'popular_post_comments_typography',
		'label'       => esc_attr__( 'Typography', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_popular_comments',
		'default'     => array(
			'font-family'    => 'Lato',
			'font-size'      => '12px',
			'font-weight'    => '400',
			'letter-spacing' => '0px',
		),
		'choices'     => array(
			'font-family'    => true,
			'font-size'      => true,
			'font-weight'    => true,
			'letter-spacing' => true,
		),
		'output' => array(
			array(
				'element' => '#footer-posts .blog-post-alt-comments-count',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'popular_post_comments_color',
		'label'       => __( 'Text Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_popular_comments',
		'default'     => '#999',
		'output' => array(
			array(
				'element' => '#footer-posts .blog-post-alt-comments-count',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '#footer-posts .blog-post-alt-comments-count',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'popular_post_comments_icon_color',
		'label'       => __( 'Icon Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_popular_comments',
		'default'     => '#232323',
		'output' => array(
			array(
				'element' => '#footer-posts .blog-post-alt-comments-count .fa',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '#footer-posts .blog-post-alt-comments-count .fa',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );