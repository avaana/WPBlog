<?php

	/**
	 * Featured Heading
	 */

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'select',
		'settings'    => $prepend . 'featured_post_heading_state',
		'label'       => __( 'Enable/Disable', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_featured_heading',
		'default'     => 'enabled',
		'choices'     => array(
			'enabled' => __( 'Enabled', 'heart-and-style' ),
			'disabled' => __( 'Disabled', 'heart-and-style' ),			
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'text',
		'settings'    => $prepend . 'featured_post_heading_title_text',
		'label'       => __( 'Title Text', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_featured_heading',
		'default'     => 'Featured Posts',
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'text',
		'settings'    => $prepend . 'featured_post_heading_link_text',
		'label'       => __( 'Link Text', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_featured_heading',
		'default'     => 'Read More',
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'text',
		'settings'    => $prepend . 'featured_post_heading_link_url',
		'label'       => __( 'Link URL', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_featured_heading',
		'default'     => '',
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'typography',
		'settings'    => $prepend . 'featured_post_heading_typography',
		'label'       => esc_attr__( 'Typography', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_featured_heading',
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
				'element' => '#header-posts .section-heading h2,#header-posts .section-heading a',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'spacing',
		'settings'    => $prepend . 'featured_post_heading_spacing',
		'label'       => esc_attr__( 'Spacing', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_featured_heading',
		'default'     => array(
			'top'       => '0',
			'bottom'    => '27px',
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
				'element' => '#header-posts .section-heading',
				'property' => 'margin'
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'featured_post_heading_color',
		'label'       => __( 'Text - Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_featured_heading',
		'default'     => '#1c1c1c',
		'output' => array(
			array(
				'element' => '#header-posts .section-heading h2',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '#header-posts .section-heading h2',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'featured_post_heading_link_color',
		'label'       => __( 'Link - Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_featured_heading',
		'default'     => '#ed6260',
		'output' => array(
			array(
				'element' => '#header-posts .section-heading a',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '#header-posts .section-heading a',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'featured_post_heading_sep_color',
		'label'       => __( 'Separator - Color', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_featured_heading',
		'default'     => '#d4d4d4',
		'output' => array(
			array(
				'element' => '#header-posts .section-heading a',
				'property' => 'border-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '#header-posts .section-heading a',
				'property' => 'border-color',
				'function' => 'css',
			),
		),
	) );