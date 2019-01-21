<?php

	/**
	 * Blog Title
	 */

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'typography',
		'settings'    => $prepend . 'blog_post_title_typography',
		'label'       => esc_attr__( 'Typography', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_blog_post_title',
		'default'     => array(
			'font-family'    => 'Arbutus Slab',
			'font-size'      => '37px',
			'font-weight'    => '500',
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
				'element' => '.blog-post-title h2,.blog-post-title h2 a',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'spacing',
		'settings'    => $prepend . 'blog_post_title_spacing',
		'label'       => esc_attr__( 'Spacing', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_blog_post_title',
		'default'     => array(
			'top'       => '0',
			'bottom'    => '19px',
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
				'element' => '.blog-post-title',
				'property' => 'margin'
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'blog_post_title_color',
		'label'       => __( 'Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_blog_post_title',
		'default'     => '#111',
		'output' => array(
			array(
				'element' => '.blog-post-title h2,.blog-post-title h2 a',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '.blog-post-title h2,.blog-post-title h2 a',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );