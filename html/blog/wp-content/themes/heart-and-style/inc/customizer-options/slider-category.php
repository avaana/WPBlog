<?php	

	/**	
	 * Slider Category
	 */
	
	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'select',
		'settings'    => $prepend . 'slider_category_state',
		'label'       => __( 'Enable/Disable', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_slider_category',
		'default'     => 'enabled',
		'choices'     => array(
			'enabled' => __( 'Enabled', 'heart-and-style' ),
			'disabled' => __( 'Disabled', 'heart-and-style' ),			
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'typography',
		'settings'    => $prepend . 'slider_category_typography',
		'label'       => esc_attr__( 'Typography', 'heart-and-style' ),
		'description' => __( 'Typography options for the category element.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_slider_category',
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
				'element' => '.blog-post-slider-cats a',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'spacing',
		'settings'    => $prepend . 'slider_category_spacing',
		'label'       => esc_attr__( 'Spacing', 'heart-and-style' ),
		'description' => __( 'Typography options for the category element.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_slider_category',
		'default'     => array(
			'top'       => '0',
			'bottom'    => '35px',
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
				'element' => '.blog-post-slider-cats',
				'property' => 'margin'
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'slider_category_color',
		'label'       => __( 'Color', 'heart-and-style' ),
		'description' => __( 'Text color of the categories.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_slider_category',
		'default'     => '#fff',
		'output' => array(
			array(
				'element' => '.blog-post-slider-cats a',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '.blog-post-slider-cats a',
				'property' => 'color',
				'function' => 'css',
			),
		),
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'color',
		'settings'    => $prepend . 'slider_category_border_color',
		'label'       => __( 'Border Color', 'heart-and-style' ),
		'description' => __( 'Border color of the categories.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_slider_category',
		'default'     => '#ed6260',
		'output' => array(
			array(
				'element' => '.blog-post-slider-cats a',
				'property' => 'border-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element' => '.blog-post-slider-cats a',
				'property' => 'border-color',
				'function' => 'css',
			),
		),
	) );