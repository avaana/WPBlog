<?php

	/**
	 * Blog Tags
	 */

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'typography',
		'settings'    => $prepend . 'blog_post_tags_typography',
		'label'       => esc_attr__( 'Typography', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_blog_post_tags',
		'default'     => array(
			'font-family'    => 'Georgia',
			'font-size'      => '13px',
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
				'element' => '.blog-post-tags',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'blog_post_tags_color',
		'label'       => __( 'Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_blog_post_tags',
		'default'     => '#646464',
		'output' => array(
			array(
				'element' => '.blog-post-tags',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '.blog-post-tags',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );