<?php

function heart_and_style_customizer_cache_css() {

	$css = Kirki_Styles_Frontend::loop_controls();

	if ( ! empty( $css ) && is_string( $css ) ) {
		update_option( HEART_AND_STYLE_CUSTOMIZER_PREPEND . 'cached_css', $css );
	}

} add_action( 'customize_save_after', 'heart_and_style_customizer_cache_css' );

if ( class_exists( 'Kirki' ) ) {

	$prepend = HEART_AND_STYLE_CUSTOMIZER_PREPEND;

	/**
	 * Add sections
	 */

	// Load Preset

	Kirki::add_section( 'heart_and_style_section_presets', array(
		'title'          => esc_attr__( '- Load Style', 'heart-and-style' ),
		'description'    => esc_attr__( 'Choosing a style here will change values of some options in the customizer to fit that style.', 'heart-and-style' ),
		'capability'     => 'edit_theme_options',
		'priority'       => 9
	) );

	// Header Panel

	Kirki::add_panel( 'heart_and_style_panel_typography', array(
		'title'       => __( '- General Typography', 'heart-and-style' ),
	) );

		Kirki::add_section( 'heart_and_style_section_typography_general', array(
			'title'          => esc_attr__( 'Content - Text', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_typography',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_typography_headings', array(
			'title'          => esc_attr__( 'Content - Headings', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_typography',
			'capability'     => 'edit_theme_options',
		) );

	// Header Panel

	Kirki::add_panel( 'heart_and_style_panel_header', array(
		'title'       => __( '- Header', 'heart-and-style' ),
	) );

		Kirki::add_section( 'heart_and_style_section_header_general', array(
			'title'          => esc_attr__( 'General', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_header',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_header_navigation', array(
			'title'          => esc_attr__( 'Navigation', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_header',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_header_logo', array(
			'title'          => esc_attr__( 'Logo', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_header',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_header_social', array(
			'title'          => esc_attr__( 'Social', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_header',
			'capability'     => 'edit_theme_options',
		) );

	// Banner

	Kirki::add_panel( 'heart_and_style_panel_tagline', array(
		'title'       => __( '- Banner', 'heart-and-style' ),
	) );

		Kirki::add_section( 'heart_and_style_section_tagline', array(
			'title'          => esc_attr__( 'Background', 'heart-and-style' ),
			'capability'     => 'edit_theme_options',
			'panel'          => 'heart_and_style_panel_tagline',
			'description'    => esc_attr__( 'These are options for the banner/tagline area just below the header ( shown on all pages except homepage ).', 'heart-and-style' ),
		) );
		
		Kirki::add_section( 'heart_and_style_section_tagline_category', array(
			'title'          => esc_attr__( 'Category', 'heart-and-style' ),
			'capability'     => 'edit_theme_options',
			'panel'          => 'heart_and_style_panel_tagline',
		) );

		Kirki::add_section( 'heart_and_style_section_tagline_title', array(
			'title'          => esc_attr__( 'Title', 'heart-and-style' ),
			'capability'     => 'edit_theme_options',
			'panel'          => 'heart_and_style_panel_tagline',
		) );

		Kirki::add_section( 'heart_and_style_section_tagline_description', array(
			'title'          => esc_attr__( 'Description', 'heart-and-style' ),
			'capability'     => 'edit_theme_options',
			'panel'          => 'heart_and_style_panel_tagline',
		) );

	// Slider Panel

	Kirki::add_panel( 'heart_and_style_panel_slider', array(
		'title'       => __( '- Slider', 'heart-and-style' ),
	) );

		Kirki::add_section( 'heart_and_style_section_slider_general', array(
			'title'          => esc_attr__( 'General', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_slider',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_slider_category', array(
			'title'          => esc_attr__( 'Category', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_slider',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_slider_title', array(
			'title'          => esc_attr__( 'Title', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_slider',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_slider_excerpt', array(
			'title'          => esc_attr__( 'Excerpt', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_slider',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_slider_button', array(
			'title'          => esc_attr__( 'Button', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_slider',
			'capability'     => 'edit_theme_options',
		) );

	// Slider Panel

	Kirki::add_panel( 'heart_and_style_panel_carousel', array(
		'title'       => __( '- Carousel', 'heart-and-style' ),
	) );

		Kirki::add_section( 'heart_and_style_section_carousel_general', array(
			'title'          => esc_attr__( 'General', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_carousel',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_carousel_title', array(
			'title'          => esc_attr__( 'Title', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_carousel',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_carousel_category', array(
			'title'          => esc_attr__( 'Category', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_carousel',
			'capability'     => 'edit_theme_options',
		) );

	// Featured Posts

	Kirki::add_panel( 'heart_and_style_panel_featured', array(
		'title'       => __( '- Featured Posts', 'heart-and-style' ),
	) );

		Kirki::add_section( 'heart_and_style_section_featured_general', array(
			'title'          => esc_attr__( 'General', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_featured',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_featured_heading', array(
			'title'          => esc_attr__( 'Heading', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_featured',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_featured_date', array(
			'title'          => esc_attr__( 'Date', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_featured',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_featured_title', array(
			'title'          => esc_attr__( 'Title', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_featured',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_featured_comments', array(
			'title'          => esc_attr__( 'Comments', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_featured',
			'capability'     => 'edit_theme_options',
		) );

	// Subscribe

	Kirki::add_panel( 'heart_and_style_panel_subscribe', array(
		'title'       => __( '- Subscribe', 'heart-and-style' ),
	) );

		Kirki::add_section( 'heart_and_style_section_subscribe_general', array(
			'title'          => esc_attr__( 'General', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_subscribe',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_subscribe_title', array(
			'title'          => esc_attr__( 'Title', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_subscribe',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_subscribe_subtitle', array(
			'title'          => esc_attr__( 'Subtitle', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_subscribe',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_subscribe_form', array(
			'title'          => esc_attr__( 'Form', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_subscribe',
			'capability'     => 'edit_theme_options',
		) );

	// Blog Panel

	Kirki::add_panel( 'heart_and_style_panel_blog', array(
		'title'       => __( '- Blog', 'heart-and-style' ),
	) );

		Kirki::add_section( 'heart_and_style_section_blog_post_category', array(
			'title'          => esc_attr__( 'Category', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_blog',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_blog_post_title', array(
			'title'          => esc_attr__( 'Title', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_blog',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_blog_post_meta', array(
			'title'          => esc_attr__( 'Meta', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_blog',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_blog_post_excerpt', array(
			'title'          => esc_attr__( 'Excerpt', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_blog',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_blog_post_button', array(
			'title'          => esc_attr__( 'Button', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_blog',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_blog_post_tags', array(
			'title'          => esc_attr__( 'Tags', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_blog',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_blog_post_share', array(
			'title'          => esc_attr__( 'Share', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_blog',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_blog_post_pagination', array(
			'title'          => esc_attr__( 'Pagination', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_blog',
			'capability'     => 'edit_theme_options',
		) );

	// Sidebar Options

	Kirki::add_panel( 'heart_and_style_panel_sidebar', array(
		'title'       => __( '- Sidebar', 'heart-and-style' ),
	) );

		Kirki::add_section( 'heart_and_style_section_sidebar_general', array(
			'title'          => esc_attr__( 'General', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_sidebar',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_sidebar_title', array(
			'title'          => esc_attr__( 'Title', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_sidebar',
			'capability'     => 'edit_theme_options',
		) );

	// Popular Posts

	Kirki::add_panel( 'heart_and_style_panel_popular', array(
		'title'       => __( '- Popular Posts', 'heart-and-style' ),
	) );

		Kirki::add_section( 'heart_and_style_section_popular_general', array(
			'title'          => esc_attr__( 'General', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_popular',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_popular_heading', array(
			'title'          => esc_attr__( 'Heading', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_popular',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_popular_date', array(
			'title'          => esc_attr__( 'Date', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_popular',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_popular_title', array(
			'title'          => esc_attr__( 'Title', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_popular',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_popular_comments', array(
			'title'          => esc_attr__( 'Comments', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_popular',
			'capability'     => 'edit_theme_options',
		) );

	// Footer Panel

	Kirki::add_panel( 'heart_and_style_panel_footer', array(
		'title'       => __( '- Footer', 'heart-and-style' ),
	) );

		Kirki::add_section( 'heart_and_style_section_footer_social', array(
			'title'          => esc_attr__( 'Top', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_footer',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_footer_widgets', array(
			'title'          => esc_attr__( 'Widgets', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_footer',
			'capability'     => 'edit_theme_options',
		) );

		Kirki::add_section( 'heart_and_style_section_footer_navigation', array(
			'title'          => esc_attr__( 'Bottom', 'heart-and-style' ),
			'panel'          => 'heart_and_style_panel_footer',
			'capability'     => 'edit_theme_options',
		) );

	Kirki::add_section( 'heart_and_style_section_social', array(
		'title'          => esc_attr__( '- Social', 'heart-and-style' ),
		'capability'     => 'edit_theme_options',
		'description'    => esc_attr__( 'IMPORTANT: Enter the full URLs to the social profiles, including the http:// part. These will be used for the social icons in the header and the footer.', 'heart-and-style' ),
	) );
	
	/**
	 * Add the configuration.
	 */
	Kirki::add_config( 'heart_and_style', array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'theme_mod',
	) );

	// Presets
	include get_template_directory() . '/inc/customizer-options/presets.php';

	// General Typography
	include get_template_directory() . '/inc/customizer-options/typo-general.php';
	include get_template_directory() . '/inc/customizer-options/typo-headings.php';

	// Header
	include get_template_directory() . '/inc/customizer-options/header-general.php';
	include get_template_directory() . '/inc/customizer-options/header-navigation.php';
	include get_template_directory() . '/inc/customizer-options/header-logo.php';
	include get_template_directory() . '/inc/customizer-options/header-social.php';
	
	// Slider
	include get_template_directory() . '/inc/customizer-options/slider-general.php';
	include get_template_directory() . '/inc/customizer-options/slider-category.php';
	include get_template_directory() . '/inc/customizer-options/slider-title.php';
	include get_template_directory() . '/inc/customizer-options/slider-excerpt.php';
	include get_template_directory() . '/inc/customizer-options/slider-button.php';

	// Carousel
	include get_template_directory() . '/inc/customizer-options/carousel-general.php';	
	include get_template_directory() . '/inc/customizer-options/carousel-title.php';
	include get_template_directory() . '/inc/customizer-options/carousel-category.php';

	// Tagline
	include get_template_directory() . '/inc/customizer-options/tagline-background.php';	
	include get_template_directory() . '/inc/customizer-options/tagline-category.php';
	include get_template_directory() . '/inc/customizer-options/tagline-title.php';
	include get_template_directory() . '/inc/customizer-options/tagline-description.php';

	// Popular Posts
	include get_template_directory() . '/inc/customizer-options/featured-general.php';
	include get_template_directory() . '/inc/customizer-options/featured-heading.php';
	include get_template_directory() . '/inc/customizer-options/featured-date.php';
	include get_template_directory() . '/inc/customizer-options/featured-title.php';
	include get_template_directory() . '/inc/customizer-options/featured-comments.php';

	// Subscribe
	include get_template_directory() . '/inc/customizer-options/subscribe-general.php';
	include get_template_directory() . '/inc/customizer-options/subscribe-title.php';
	include get_template_directory() . '/inc/customizer-options/subscribe-subtitle.php';
	include get_template_directory() . '/inc/customizer-options/subscribe-form.php';

	// Blog Posts
	include get_template_directory() . '/inc/customizer-options/blog-category.php';
	include get_template_directory() . '/inc/customizer-options/blog-title.php';
	include get_template_directory() . '/inc/customizer-options/blog-meta.php';
	include get_template_directory() . '/inc/customizer-options/blog-excerpt.php';
	include get_template_directory() . '/inc/customizer-options/blog-button.php';
	include get_template_directory() . '/inc/customizer-options/blog-tags.php';
	include get_template_directory() . '/inc/customizer-options/blog-pagination.php';

	// Sidebar
	include get_template_directory() . '/inc/customizer-options/sidebar-title.php';

	// Popular Posts
	include get_template_directory() . '/inc/customizer-options/popular-general.php';
	include get_template_directory() . '/inc/customizer-options/popular-heading.php';
	include get_template_directory() . '/inc/customizer-options/popular-date.php';
	include get_template_directory() . '/inc/customizer-options/popular-title.php';
	include get_template_directory() . '/inc/customizer-options/popular-comments.php';

	// Footer
	include get_template_directory() . '/inc/customizer-options/footer-social.php';
	include get_template_directory() . '/inc/customizer-options/footer-widgets.php';
	include get_template_directory() . '/inc/customizer-options/footer-navigation.php';

	// Social
	include get_template_directory() . '/inc/customizer-options/social.php';		
	

}