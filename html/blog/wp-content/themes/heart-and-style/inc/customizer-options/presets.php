<?php

	/**
	 * Presets
	 */

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'preset',
		'settings'    => $prepend . 'preset',
		'label'       => __( 'Style', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_presets',
		'default'     => '1',
		//'priority'    => 10,
		//'multiple'    => 3,
		'choices'     => array(
			'preset-1' => array(
				'label'    => __( 'Style 1', 'heart-and-style' ),
				'settings' => array(
					// General
					$prepend . 'typography_general_link_color' => '#ed6260',
					$prepend . 'typography_general_link_color_hover' => '#ed6260',

					// Header
					$prepend . 'header_height' => '70',
					$prepend . 'header_bg_color' => '#0a0a0a',
					$prepend . 'header_drop_shadow' => '1',

					// Nav
					$prepend . 'navigation_border_color_hover' => '#ed6260',
					$prepend . 'navigation_border_color_active' => '#ed6260',
					$prepend . 'navigation_color' => '#ffffff',
					$prepend . 'navigation_color_hover' => '#ffffff',
					$prepend . 'navigation_color_active' => '#ffffff',
					$prepend . 'navigation_sub_bg_color' => '#2a2a2a',
					$prepend . 'navigation_sub_border_color' => '#404040',
					$prepend . 'navigation_sub_color' => '#686868',
					$prepend . 'navigation_sub_color_hover' => '#ffffff',
					$prepend . 'navigation_sub_color_active' => '#ffffff',

					// Logo
					$prepend . 'logo_position' => 'inline_left',
					$prepend . 'logo_padding' => array(
						'top' => '25px',
						'bottom' => '0px',
					),

					// Social
					$prepend . 'header_social_color' => '#ffffff',
					$prepend . 'header_social_search_bg_color' => '#434343',
					$prepend . 'header_social_search_color' => '#ffffff',
					$prepend . 'header_social_search_close_color' => '#dddddd',

					// Slider
					$prepend . 'carousel_state' => 'enabled',
					$prepend . 'slider_state' => 'disabled',
					$prepend . 'slider_posts_amount' => '-1',
					$prepend . 'slider_category_border_color' => '#ed6260',
					$prepend . 'slider_title_typography' => array(        
						'font-family'    => 'Old Standard TT',
						'font-size'      => '65px',
						'font-weight'    => '700',
						'letter-spacing' => '0',
					),
					$prepend . 'slider_excerpt_typography' => array(
						'font-family'    => 'Georgia',
						'font-size'      => '16px',
						'font-weight'    => '700',
						'letter-spacing' => '0',
					),
					$prepend . 'slider_button_spacing' => array(
						'top'       => '14px',
						'bottom'    => '14px',
						'left'       => '15px',
						'right'    => '15px',
					),
					$prepend . 'slider_button_border_width' => '1',
					$prepend . 'slider_button_border_radius' => '0',

					// Banner
					$prepend . 'tagline_category_border_color' => '#ed6260',

					// Featured 
					$prepend . 'featured_posts_bg_color' => '#fff',
					$prepend . 'featured_post_heading_link_color' => '#ed6260',
					$prepend . 'featured_post_title_typography' => array(
						'font-family'    => 'Lora',
						'font-size'      => '17px',
						'font-weight'    => '600',
						'letter-spacing' => '0px',
					),
					$prepend . 'featured_posts_margin' => array(
						'top' => '0px',
						'bottom' => '0px',
					),

					// Popular
					$prepend . 'popular_post_heading_link_color' => '#6ab999',
					$prepend . 'popular_post_title_typography' => array(
						'font-family'    => 'Lora',
						'font-size'      => '17px',
						'font-weight'    => '600',
						'letter-spacing' => '0px',
					),
					$prepend . 'popular_post_title_color' => '#1d1d1d',

					// Footer widgets
					$prepend . 'footer_widgets_content_color_a' => '#6ab999',

					// Blog posts
					$prepend . 'blog_post_category_border_color' => '#ed6260',
					$prepend . 'blog_post_pagination_bg_color' => '#ee6c6b',
				),
			),
			'preset-2' => array(
				'label'    => __( 'Style 2', 'heart-and-style' ),
				'settings' => array(
					// General
					$prepend . 'typography_general_link_color' => '#20bf9d',
					$prepend . 'typography_general_link_color_hover' => '#20bf9d',

					// Header
					$prepend . 'header_height' => '70',
					$prepend . 'header_bg_color' => '#fff',
					$prepend . 'header_drop_shadow' => 'enabled',

					// Nav
					$prepend . 'navigation_border_color_hover' => '#25d3ae',
					$prepend . 'navigation_border_color_active' => '#25d3ae',
					$prepend . 'navigation_color' => '#151515',
					$prepend . 'navigation_color_hover' => '#151515',
					$prepend . 'navigation_color_active' => '#151515',
					$prepend . 'navigation_sub_bg_color' => '#fff',
					$prepend . 'navigation_sub_border_color' => '#ededed',
					$prepend . 'navigation_sub_color' => '#9a9a9a',
					$prepend . 'navigation_sub_color_hover' => '#151515',
					$prepend . 'navigation_sub_color_active' => '#151515',

					// Logo
					$prepend . 'logo_position' => 'inline_center',
					$prepend . 'logo_padding' => array(
						'top' => '25px',
						'bottom' => '0px',
					),

					// Social
					$prepend . 'header_social_color' => '#1e1e1e',
					$prepend . 'header_social_search_bg_color' => '#e6e6e6',
					$prepend . 'header_social_search_color' => '#000',
					$prepend . 'header_social_search_close_color' => '#6a6a6a',

					// Slider
					$prepend . 'carousel_state' => 'disabled',
					$prepend . 'slider_state' => 'enabled',
					$prepend . 'slider_posts_amount' => '-1',
					$prepend . 'slider_category_border_color' => '#31fad0',
					$prepend . 'slider_title_typography' => array(        
						'font-family' => 'Arbutus Slab',
						'font-size' => '63px',
						'font-weight' => '400',
						'letter-spacing' => '0',
					),
					$prepend . 'slider_excerpt_typography' => array(
						'font-family' => 'Georgia',
						'font-size' => '18px',
						'font-weight' => '700',
						'letter-spacing' => '0',
					),
					$prepend . 'slider_button_spacing' => array(
						'top' => '18px',
						'bottom' => '18px',
						'left' => '23px',
						'right' => '23px',
					),
					$prepend . 'slider_button_border_width' => '2',
					$prepend . 'slider_button_border_radius' => '100',

					// Banner
					$prepend . 'tagline_category_border_color' => '#31fad0',

					// Featured 
					$prepend . 'featured_posts_bg_color' => '#eff1f3',
					$prepend . 'featured_post_heading_link_color' => '#22cfab',
					$prepend . 'featured_post_title_typography' => array(
						'font-family' => 'Merriweather',
						'font-size' => '16px',
						'font-weight' => '600',
						'letter-spacing' => '0px',
					),
					$prepend . 'featured_posts_margin' => array(
						'top' => '0px',
						'bottom' => '40px',
					),

					// Popular
					$prepend . 'popular_post_heading_link_color' => '#25d3ae',
					$prepend . 'popular_post_title_typography' => array(
						'font-family' => 'Merriweather',
						'font-size' => '16px',
						'font-weight' => '600',
						'letter-spacing' => '0px',
					),
					$prepend . 'popular_post_title_color' => '#1d1d1d',

					// Footer widgets
					$prepend . 'footer_widgets_content_color_a' => '#25d3ae',

					// Blog posts
					$prepend . 'blog_post_category_border_color' => '#25d3ae',
					$prepend . 'blog_post_pagination_bg_color' => '#20bf9d',
				),
			),
			'preset-3' => array(
				'label'    => __( 'Style 3', 'heart-and-style' ),
				'settings' => array(
					// General
					$prepend . 'typography_general_link_color' => '#20bf9d',
					$prepend . 'typography_general_link_color_hover' => '#20bf9d',

					// Header
					$prepend . 'header_height' => '50',
					$prepend . 'header_bg_color' => '#f4f4f4',
					$prepend . 'header_drop_shadow' => 'disabled',

					// Nav
					$prepend . 'navigation_border_color_hover' => '#31fad0',
					$prepend . 'navigation_border_color_active' => '#31fad0',
					$prepend . 'navigation_color' => '#151515',
					$prepend . 'navigation_color_hover' => '#151515',
					$prepend . 'navigation_color_active' => '#151515',
					$prepend . 'navigation_sub_bg_color' => '#fff',
					$prepend . 'navigation_sub_border_color' => '#ededed',
					$prepend . 'navigation_sub_color' => '#9a9a9a',
					$prepend . 'navigation_sub_color_hover' => '#151515',
					$prepend . 'navigation_sub_color_active' => '#151515',

					// Logo
					$prepend . 'logo_position' => 'below_center',
					$prepend . 'logo_padding' => array(
						'top' => '34px',
						'bottom' => '34px',
					),

					// Social
					$prepend . 'header_social_color' => '#1e1e1e',
					$prepend . 'header_social_search_bg_color' => '#e6e6e6',
					$prepend . 'header_social_search_color' => '#000',
					$prepend . 'header_social_search_close_color' => '#6a6a6a',

					// Slider
					$prepend . 'carousel_state' => 'disabled',
					$prepend . 'slider_state' => 'enabled',
					$prepend . 'slider_posts_amount' => '1',
					$prepend . 'slider_category_border_color' => '#31fad0',
					$prepend . 'slider_title_typography' => array(        
						'font-family'    => 'Old Standard TT',
						'font-size'      => '65px',
						'font-weight'    => '700',
						'letter-spacing' => '0',
					),
					$prepend . 'slider_excerpt_typography' => array(
						'font-family'    => 'Georgia',
						'font-size'      => '16px',
						'font-weight'    => '700',
						'letter-spacing' => '0',
					),
					$prepend . 'slider_button_spacing' => array(
						'top'       => '14px',
						'bottom'    => '14px',
						'left'       => '15px',
						'right'    => '15px',
					),
					$prepend . 'slider_button_border_width' => '2',
					$prepend . 'slider_button_border_radius' => '100',

					// Banner
					$prepend . 'tagline_category_border_color' => '#31fad0',

					// Featured
					$prepend . 'featured_posts_bg_color' => '#fff',
					$prepend . 'featured_post_heading_link_color' => '#25d3ae',
					$prepend . 'featured_post_title_typography' => array(
						'font-family' => 'Merriweather',
						'font-size' => '16px',
						'font-weight' => '600',
						'letter-spacing' => '0px',
					),
					$prepend . 'featured_posts_margin' => array(
						'top' => '0px',
						'bottom' => '0px',
					),

					// Popular
					$prepend . 'popular_post_heading_link_color' => '#25d3ae',
					$prepend . 'popular_post_title_typography' => array(
						'font-family' => 'Merriweather',
						'font-size' => '16px',
						'font-weight' => '600',
						'letter-spacing' => '0px',
					),
					$prepend . 'popular_post_title_color' => '#1d1d1d',

					// Footer Widgets
					$prepend . 'footer_widgets_content_color_a' => '#6ab999',

					// Blog posts
					$prepend . 'blog_post_category_border_color' => '#31fad0',
					$prepend . 'blog_post_pagination_bg_color' => '#20bf9d',
					
				),
			),
		),
	));