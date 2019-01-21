<?php
/**
 * Customizer functionality ( powered by Kirki plugin )
 *
 * @package Floro
 * @since Floro 1.0
 */

/**
 * Make sure Kirki plugin is active
 */
if ( class_exists( 'Kirki' ) ) {

	$prepend = FLORO_CUSTOMIZER_PREPEND;

	/**
	 * Sections
	 */

	Kirki::add_section( 'floro_section_social', array(
		'title'          => esc_html__( 'Social', 'floro' ),
		'capability'     => 'edit_theme_options',
		'description'    => esc_html__( 'IMPORTANT: Enter the full URLs to the social profiles, including the http:// part. These will be used for the social icons in the header and the footer.', 'floro' ),
	) );
	
	/**
	 * Config
	 */

	Kirki::add_config( 'floro', array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'option',
	) );	

	/**
	 * Options
	 */

	Kirki::add_field( 'floro', array(
		'type'        => 'url',
		'settings'    => $prepend . 'social_twitter',
		'label'       => esc_html__( 'Twitter URL', 'floro' ),
		'section'     => 'floro_section_social',
	) );

	Kirki::add_field( 'floro', array(
		'type'        => 'url',
		'settings'    => $prepend . 'social_facebook',
		'label'       => esc_html__( 'Facebook URL', 'floro' ),
		'section'     => 'floro_section_social',
	) );

	Kirki::add_field( 'floro', array(
		'type'        => 'url',
		'settings'    => $prepend . 'social_youtube',
		'label'       => esc_html__( 'Youtube URL', 'floro' ),
		'section'     => 'floro_section_social',
	) );

	Kirki::add_field( 'floro', array(
		'type'        => 'url',
		'settings'    => $prepend . 'social_vimeo',
		'label'       => esc_html__( 'Vimeo URL', 'floro' ),
		'section'     => 'floro_section_social',
	) );
	
	Kirki::add_field( 'floro', array(
		'type'        => 'url',
		'settings'    => $prepend . 'social_tumblr',
		'label'       => esc_html__( 'Tumblr URL', 'floro' ),
		'section'     => 'floro_section_social',
	) );

	Kirki::add_field( 'floro', array(
		'type'        => 'url',
		'settings'    => $prepend . 'social_pinterest',
		'label'       => esc_html__( 'Pinterest URL', 'floro' ),
		'section'     => 'floro_section_social',
	) );

	Kirki::add_field( 'floro', array(
		'type'        => 'url',
		'settings'    => $prepend . 'social_linkedin',
		'label'       => esc_html__( 'LinkedIn URL', 'floro' ),
		'section'     => 'floro_section_social',
	) );
	
	Kirki::add_field( 'floro', array(
		'type'        => 'url',
		'settings'    => $prepend . 'social_instagram',
		'label'       => esc_html__( 'Instagram URL', 'floro' ),
		'section'     => 'floro_section_social',
	) );

	Kirki::add_field( 'floro', array(
		'type'        => 'url',
		'settings'    => $prepend . 'social_github',
		'label'       => esc_html__( 'Github URL', 'floro' ),
		'section'     => 'floro_section_social',
	) );
		
	Kirki::add_field( 'floro', array(
		'type'        => 'url',
		'settings'    => $prepend . 'social_googleplus',
		'label'       => esc_html__( 'Google+ URL', 'floro' ),
		'section'     => 'floro_section_social',
	) );
	
	Kirki::add_field( 'floro', array(
		'type'        => 'url',
		'settings'    => $prepend . 'social_dribbble',
		'label'       => esc_html__( 'Dribbble URL', 'floro' ),
		'section'     => 'floro_section_social',
	) );

	Kirki::add_field( 'floro', array(
		'type'        => 'url',
		'settings'    => $prepend . 'social_dropbox',
		'label'       => esc_html__( 'Dropbox URL', 'floro' ),
		'section'     => 'floro_section_social',
	) );
		
	Kirki::add_field( 'floro', array(
		'type'        => 'url',
		'settings'    => $prepend . 'social_flickr',
		'label'       => esc_html__( 'Flickr URL', 'floro' ),
		'section'     => 'floro_section_social',
	) );
		
	Kirki::add_field( 'floro', array(
		'type'        => 'url',
		'settings'    => $prepend . 'social_foursquare',
		'label'       => esc_html__( 'Foursquare URL', 'floro' ),
		'section'     => 'floro_section_social',
	) );
	
	Kirki::add_field( 'floro', array(
		'type'        => 'url',
		'settings'    => $prepend . 'social_behance',
		'label'       => esc_html__( 'Behance URL', 'floro' ),
		'section'     => 'floro_section_social',
	) );
	
	Kirki::add_field( 'floro', array(
		'type'        => 'url',
		'settings'    => $prepend . 'social_rss',
		'label'       => esc_html__( 'RSS URL', 'floro' ),
		'section'     => 'floro_section_social',
	) );
	

}