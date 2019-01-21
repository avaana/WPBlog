<?php	

	/**	
	 * Carousel Category
	 */
	
	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'select',
		'settings'    => $prepend . 'carousel_category_state',
		'label'       => __( 'Enable/Disable', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_carousel_category',
		'default'     => 'enabled',
		'choices'     => array(
			'enabled' => __( 'Enabled', 'heart-and-style' ),
			'disabled' => __( 'Disabled', 'heart-and-style' ),			
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'typography',
		'settings'    => $prepend . 'carousel_category_typography',
		'label'       => esc_attr__( 'Typography', 'heart-and-style' ),
		'description' => __( 'Typography options for the category element.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_carousel_category',
		'default'     => array(
			'font-family'    => 'Lato',
			'font-size'      => '10px',
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
				'element' => '.blog-post-carousel-front-cats a',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'carousel_category_color',
		'label'       => __( 'Color', 'heart-and-style' ),
		'description' => __( 'Text color of the categories.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_carousel_category',
		'default'     => '#c2c2c2',
		'output' => array(
			array(
				'element' => '.blog-post-carousel-front-cats a',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '.blog-post-carousel-front-cats a',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'carousel_category_border_color',
		'label'       => __( 'Border Color', 'heart-and-style' ),
		'description' => __( 'Border color of the categories.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_carousel_category',
		'default'     => '#ed6260',
		'output' => array(
			array(
				'element' => '.blog-post-carousel-front-cats a',
				'property' => 'border-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '.blog-post-carousel-front-cats a',
				'property' => 'border-color',
				'function' => 'css',
			),
		),
	) );