<?php

	/**
	 * Tagline
	 */

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'image',
		'settings'    => $prepend . 'tagline_bg_img_default',
		'label'       => esc_attr__( 'Default BG Image', 'heart-and-style' ),
		'description' => esc_attr__( 'Will apply to all posts/pages that do not have a special image set.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_tagline',
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'image',
		'settings'    => $prepend . 'tagline_bg_img_search',
		'label'       => esc_attr__( 'Search Results BG Image', 'heart-and-style' ),
		'description' => esc_attr__( 'Will apply to search results page.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_tagline',
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'image',
		'settings'    => $prepend . 'tagline_bg_img_archives',
		'label'       => esc_attr__( 'Archives BG Image', 'heart-and-style' ),
		'description' => esc_attr__( 'Will apply to archive pages ( category, tag, author... ).', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_tagline',
	) );

	Kirki::add_field( 'heart_and_style', array(
		'type'        => 'image',
		'settings'    => $prepend . 'tagline_bg_img_404',
		'label'       => esc_attr__( '404 BG Image', 'heart-and-style' ),
		'description' => esc_attr__( 'Will apply to 404 page.', 'heart-and-style' ),
		'section'     => 'heart_and_style_section_tagline',
	) );