<?php
/**
 * Functions and definitions
 *
 * @package Floro
 * @since Floro 1.0
 */

/**
 * Table Of Contents
 *
 * floro_setup ( Sets up theme defaults and registers support for various WordPress features )
 * floro_content_width ( Set the content width global variable )
 * floro_register_sidebars ( Register sidebars )
 * floro_scripts ( Enqueue scripts and styles )
 * floro_google_fonts_url ( Google Fonts URL generator )
 * Include other files
 */

define( 'FLORO_VER', '1.1.2' );
define( 'FLORO_CUSTOMIZER_PREPEND', 'floro_' );

if ( ! function_exists( 'floro_setup' ) ) {

	/**
	 * Sets up theme defaults and registers support for various WordPress features
	 *
	 * @since 1.0
	 */
	function floro_setup() {
		
		// Translation
		load_theme_textdomain( 'floro', get_template_directory() . '/languages' );

		// Theme support
		add_theme_support( 'custom-logo', array(
			'width' => 232,
			'height' => 20,
			'flex-width' => true,
			'header-text' => array( 'site-title' ),
		));
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array( 'search-form', 'comment-list', 'gallery', 'caption' ) );

		// Register Menus
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'floro' ),
			'footer' => esc_html__( 'Footer', 'floro' ),
		) );

		// Image sizes
		add_image_size( 'floro-posts-widget', 600, 99999, false );
		add_image_size( 'floro-posts-listing', 1084, 99999, false );

	}

} add_action( 'after_setup_theme', 'floro_setup' );

if ( ! function_exists( 'floro_content_width' ) ) {

	/**
	 * Set the content width global variable
	 *
	 * @since 1.0
	 * @global int $content_width
	 */
	function floro_content_width() {
		
		$GLOBALS['content_width'] = apply_filters( 'floro_content_width', 1084 );

	}

} add_action( 'after_setup_theme', 'floro_content_width', 0 );

if ( ! function_exists( 'floro_register_sidebars' ) ) {

	/**
	 * Register Sidebars
	 *
	 * @since 1.0
	 */
	function floro_register_sidebars() {

		// Sidebar
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'floro' ),
			'id'            => 'sidebar-1',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

	}

} add_action( 'widgets_init', 'floro_register_sidebars' );

if ( ! function_exists( 'floro_scripts' ) ) {
	
	/**
	 * Enqueue scripts and styles
	 *
	 * @since 1.0
	 */
	function floro_scripts() {

		// Styles
		wp_enqueue_style( 'floro-style', get_stylesheet_uri() );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/fonts/font-awesome/font-awesome.css' );

		// Scripts
		wp_enqueue_script( 'floro-main-js', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), FLORO_VER, true );

		// Google Fonts
		wp_enqueue_style( 'floro-google-fonts', floro_google_fonts_url(), array(), FLORO_VER );

		// Comment reply script
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}

} add_action( 'wp_enqueue_scripts', 'floro_scripts' );

if ( ! function_exists( 'floro_google_fonts_url' ) ) {

	/**
	 * Returns the google fonts URL
	 *
	 * @since 1.0
	 */
	function floro_google_fonts_url() {
		
		$font_url = '';

		/*
		Translators: If there are characters in your language that are not supported
		by chosen font(s), translate this to 'off'. Do not translate into your own language.
		*/
		$font_state = _x( 'on', 'Google fonts: on or off', 'floro' );
		if ( 'off' !== $font_state ) {
			$font_url = add_query_arg( 'family', urlencode( 'Lora:400,700|Lato:400,100,300,700,900|Arbutus Slab|Playfair Display:400,700,900|Libre Baskerville:400,700' ), "//fonts.googleapis.com/css" );
		}

		return $font_url;
	}

}

// Include TGM Init ( plugin activation )
include get_template_directory() . '/inc/tgm/tgm-init.php';

// Include Options
include get_template_directory() . '/inc/customizer-options.php';

// Include Functions
include get_template_directory() . '/inc/logic.php';
include get_template_directory() . '/inc/display.php';

// Include Widgets
include get_template_directory() . '/inc/widgets/widget.posts.php';
include get_template_directory() . '/inc/widgets/widget.social.php';