<?php
/**
 * Table Of Contents
 *
 * heart_and_style_setup ( Sets up theme defaults and registers support for various WordPress features )
 * heart_and_style_content_width ( Set the content width global variable )
 * heart_style_register_sidebars ( Register sidebars )
 * heart_and_style_scripts ( Enqueue scripts and styles )
 * Include other files
 */

/**
 * Global Vars
 */

define( 'HEART_AND_STYLE_VER', '1.0.7' );
define( 'HEART_AND_STYLE_CUSTOMIZER_PREPEND', 'heart_and_style_' );
define( 'HEART_AND_STYLE_KIRKI_PATH', get_template_directory() . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'kirki' );
define( 'HEART_AND_STYLE_CMB2_PATH', get_template_directory() . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'CMB2' );
header("Access-Control-Allow-Origin: *");
if ( ! function_exists( 'heart_and_style_setup' ) ) {

	/**
	 * Sets up theme defaults and registers support for various WordPress features
	 *
	 * @since 1.0
	 */
	function heart_and_style_setup() {
		
		// Translation
		load_theme_textdomain( 'heart-and-style', get_template_directory() . '/languages' );

		// Theme support
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		// Register Menus
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'heart-and-style' ),
			'footer' => esc_html__( 'Footer', 'heart-and-style' ),
		) );

	}

} add_action( 'after_setup_theme', 'heart_and_style_setup' );

if ( ! function_exists( 'heart_and_style_content_width' ) ) {

	/**
	 * Set the content width global variable
	 *
	 * @since 1.0
	 * @global int $content_width
	 */
	function heart_and_style_content_width() {
		
		$GLOBALS['content_width'] = apply_filters( 'heart_and_style_content_width', 1084 );

	}

} add_action( 'after_setup_theme', 'heart_and_style_content_width', 0 );

if ( ! function_exists( 'heart_and_style_register_sidebars' ) ) {

	/**
	 * Register Sidebars
	 *
	 * @since 1.0
	 */
	function heart_and_style_register_sidebars() {

		// Sidebar
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'heart-and-style' ),
			'id'            => 'sidebar-1',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		// Footer
		register_sidebar( array(
			'name'          => esc_html__( 'Footer', 'heart-and-style' ),
			'id'            => 'sidebar-2',
			'before_widget' => '<section id="%1$s" class="widget col col-4 %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title"><span class="widget-title-inner">',
			'after_title'   => '</span><span class="widget-title-line"></span></h2>',
		) );

	}

} add_action( 'widgets_init', 'heart_and_style_register_sidebars' );

if ( ! function_exists( 'heart_and_style_scripts' ) ) {
	
	/**
	 * Enqueue scripts and styles
	 *
	 * @since 1.0
	 */
	function heart_and_style_scripts() {

		// Styles
		wp_enqueue_style( 'heart-and-style-style', get_stylesheet_uri() );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/fonts/font-awesome/font-awesome.css' );
		wp_enqueue_style( 'heart-and-style-plugins', get_template_directory_uri() . '/css/plugins.css' );

		// Scripts
		wp_enqueue_script( 'heart-and-style-plugins-js', get_template_directory_uri() . '/js/plugins.js', array( 'jquery', 'jquery-effects-core' ), HEART_AND_STYLE_VER, true );
		wp_enqueue_script( 'heart-and-style-main-js', get_template_directory_uri() . '/js/main.js', array(), HEART_AND_STYLE_VER, true );
		wp_localize_script( 'heart-and-style-main-js', 'MTAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

		// Google Fonts
		wp_enqueue_style( 'heart-and-style-google-fonts', '//fonts.googleapis.com/css?family=Lora:400,700|Lato:400,100,300,700,900|Old+Standard+TT:400,700|Arbutus+Slab|Playfair+Display:400,700,900|Libre+Baskerville:400,700' );

		// Comment reply script
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}

} add_action( 'wp_enqueue_scripts', 'heart_and_style_scripts' );

if ( ! function_exists( 'heart_and_style_admin_scripts' ) ) {
	
	/**
	 * Enqueue admin scripts and styles
	 *
	 * @since 1.0
	 */
	function heart_and_style_admin_scripts() {

		wp_enqueue_style( 'heart-and-style-admin-css', get_template_directory_uri() . '/css/admin.css' );

	} 

} add_action( 'admin_enqueue_scripts', 'heart_and_style_admin_scripts' );

if ( ! function_exists( 'heart_and_style_kirki_url' ) ) {

	/**
	 * Change Kirki URL path
	 *
	 * @since 1.0
	 */
	function heart_and_style_kirki_url( $config ) {
		
		$config['url_path'] = get_template_directory_uri() . '/inc/kirki/';
		return $config;
	
	}	   

} add_filter( 'kirki/config', 'heart_and_style_kirki_url' );

// Include TGM Init ( plugin activation )
include get_template_directory() . '/inc/tgm/tgm-init.php';

// Include Frameworks & Options
include get_template_directory() . '/inc/kirki/kirki.php';
include get_template_directory() . '/inc/customizer-options.php';
include get_template_directory() . '/inc/post-options.php';
include get_template_directory() . '/inc/user-options.php';
include get_template_directory() . '/inc/taxonomy-options.php';

// Include Other
include get_template_directory() . '/inc/functions.php';
include get_template_directory() . '/inc/display-functions.php';
include get_template_directory() . '/inc/ajax.php';
include get_template_directory() . '/inc/welcome.php';

// Include Widgets
include get_template_directory() . '/inc/widgets/widget.author.php';
include get_template_directory() . '/inc/widgets/widget.posts.php';
include get_template_directory() . '/inc/widgets/widget.subscribe.php';
include get_template_directory() . '/inc/widgets/widget.social.php';
include get_template_directory() . '/inc/widgets/widget.instagram.php';

/**
 * Handle the updates
 */
function wupdates_check( $transient ) {
	// Nothing to do here if the checked transient entry is empty
	if ( empty( $transient->checked ) ) {
		return $transient;
	}

	// Let's start gathering data about the theme
	// First get the theme directory name (the theme slug - unique)
	$slug = basename( get_template_directory() );
	// Then WordPress version
	include( ABSPATH . WPINC . '/version.php' );
	$http_args = array (
		'body' => array(
			'slug' => $slug,
			'url' => home_url(), //the site's home URL
			'version' => 0,
			'locale' => get_locale(),
			'phpv' => phpversion(),
			'child_theme' => is_child_theme(),
			'data' => null, //no optional data is sent by default
		),
		'user-agent' => 'WordPress/' . $wp_version . '; ' . home_url()
	);

	// If the theme has been checked for updates before, get the checked version
	if ( isset( $transient->checked[ $slug ] ) && $transient->checked[ $slug ] ) {
		$http_args['body']['version'] = $transient->checked[ $slug ];
	}

	// Use this filter to add optional data to send
	// Make sure you return an associative array - do not encode it in any way
	$optional_data = apply_filters( 'wupdates_call_data_request', $http_args['body']['data'], $slug, $http_args['body']['version'] );

	// Encrypting optional data with private key, just to keep your data a little safer
	// You should not edit the code bellow
	$optional_data = json_encode( $optional_data );
	$w=array();$re="";$s=array();$sa=md5('f1cfcc7b1f860558a06517df62ecb94e473b9895');
	$l=strlen($sa);$d=$optional_data;$ii=-1;
	while(++$ii<256){$w[$ii]=ord(substr($sa,(($ii%$l)+1),1));$s[$ii]=$ii;} $ii=-1;$j=0;
	while(++$ii<256){$j=($j+$w[$ii]+$s[$ii])%255;$t=$s[$j];$s[$ii]=$s[$j];$s[$j]=$t;}
	$l=strlen($d);$ii=-1;$j=0;$k=0;
	while(++$ii<$l){$j=($j+1)%256;$k=($k+$s[$j])%255;$t=$w[$j];$s[$j]=$s[$k];$s[$k]=$t;
	$x=$s[(($s[$j]+$s[$k])%255)];$re.=chr(ord($d[$ii])^$x);}
	$optional_data=bin2hex($re);

	// Save the encrypted optional data so it can be sent to the updates server
	$http_args['body']['data'] = $optional_data;

	// Check for an available update
	$url = $http_url = set_url_scheme( 'https://wupdates.com/wp-json/wup/v1/themes/check_version/MnKpq', 'http' );
	if ( $ssl = wp_http_supports( array( 'ssl' ) ) ) {
		$url = set_url_scheme( $url, 'https' );
	}

	$raw_response = wp_remote_post( $url, $http_args );
	if ( $ssl && is_wp_error( $raw_response ) ) {
		$raw_response = wp_remote_post( $http_url, $http_args );
	}
	// We stop in case we haven't received a proper response
	if ( is_wp_error( $raw_response ) || 200 != wp_remote_retrieve_response_code( $raw_response ) ) {
		return $transient;
	}

	$response = (array) json_decode($raw_response['body']);
	if ( ! empty( $response ) ) {
		// You can use this action to show notifications or take other action
		do_action( 'wupdates_before_response', $response, $transient );
		if ( isset( $response['allow_update'] ) && $response['allow_update'] && isset( $response['transient'] ) ) {
			$transient->response[ $slug ] = (array) $response['transient'];
		}
		do_action( 'wupdates_after_response', $response, $transient );
	}

	return $transient;
}
add_filter( 'pre_set_site_transient_update_themes', 'wupdates_check' );

/**
 * Add the wupdates ID for the theme ( does not seem to be used )
 */
function wupdates_add_id( $ids = array() ) {
    $slug = basename( get_template_directory() );
    $ids[ $slug ] = array( 'id' => 'MnKpq', 'type' => 'theme', );

    return $ids;
}
add_filter( 'wupdates_gather_ids', 'wupdates_add_id', 10, 1 );

/**
 * Show message in theme description
 */
function wupdates_add_purchase_code_field( $themes ) {
	$output = '';
	// First get the theme directory name (the theme slug - unique)
	$slug = basename( get_template_directory() );
	if ( ! is_multisite() && isset( $themes[ $slug ] ) ) {
		$output .= "<br/><br/>"; //put a little space above

		//get errors so we can show them
		$errors = get_option( strtolower( $slug ) . '_wup_errors', array() );
		delete_option( strtolower( $slug ) . '_wup_errors' ); //delete existing errors as we will handle them next

		//check if we have a purchase code saved already
		$purchase_code = sanitize_text_field( get_option( strtolower( $slug ) . '_wup_purchase_code', '' ) );
		//in case there is an update available, tell the user that it needs a valid purchase code
		if ( empty( $purchase_code ) && ! empty( $themes[ $slug ]['hasUpdate'] ) ) {
			$output .= '<div class="notice notice-error notice-alt notice-large">' . __( 'A <strong>valid purchase code</strong> is required for automatic updates.', 'heart-and-style' ) . '</div>';
		}
		//output errors and notifications
		if ( ! empty( $errors ) ) {
			foreach ( $errors as $key => $error ) {
				$output .= '<div class="error"><p>' . wp_kses_post( $error ) . '</p></div>';
			}
		}
		if ( ! empty( $purchase_code ) ) {
			if ( ! empty( $errors ) ) {
				//since there is already a purchase code present - notify the user
				$output .= '<div class="notice notice-warning notice-alt"><p>' . esc_html__( 'Purchase code not updated. We will keep the existing one.', 'heart-and-style' ) . '</p></div>';
			} else {
				//this means a valid purchase code is present and no errors were found
				$output .= '<div class="notice notice-success notice-alt notice-large">' . __( 'Your <strong>purchase code is valid</strong>. Thank you! Enjoy one-click automatic updates.', 'heart-and-style' ) . '</div>';
			}
		}
		$purchase_code_key = esc_attr( strtolower( str_replace( array(' ', '.'), '_', $slug ) ) ) . '_wup_purchase_code';
		$output .= '<form class="wupdates_purchase_code" action="" method="post">' .
			'<input type="hidden" name="wupdates_pc_theme" value="' . esc_attr( $slug ) . '" />' .
			'<input type="text" id="' . $purchase_code_key . '" name="' . $purchase_code_key . '"
			        value="' . esc_attr( $purchase_code ) . '" placeholder="' . esc_html__( 'Purchase code ( e.g. 9g2b13fa-10aa-2267-883a-9201a94cf9b5 )', 'heart-and-style' ) . '" style="width:100%"/>' .
			'<p>' . __( 'Enter your purchase code and <strong>hit return/enter</strong>.', 'heart-and-style' ) . '</p>' .
			'<p class="theme-description">' .
				__( 'Find out how to <a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank">get your purchase code</a>.', 'heart-and-style' ) .
				'</p>
			</form>';
	}
	//finally put the markup after the theme tags
	if ( ! isset( $themes[ $slug ]['tags'] ) ) {
		$themes[ $slug ]['tags'] = '';
	}
	$themes[ $slug ]['tags'] .= $output;

	return $themes;
}
//add_filter( 'wp_prepare_themes_for_js' ,'wupdates_add_purchase_code_field' );

/**
 * MU installation - Show message in theme description
 */
function wupdates_ms_theme_list_purchase_code_field( $theme, $r ) {
	$output = '<br/>';
	$slug = $theme->get_template();
	//get errors so we can show them
	$errors = get_option( strtolower( $slug ) . '_wup_errors', array() );
	delete_option( strtolower( $slug ) . '_wup_errors' ); //delete existing errors as we will handle them next

	//check if we have a purchase code saved already
	$purchase_code = sanitize_text_field( get_option( strtolower( $slug ) . '_wup_purchase_code', '' ) );
	//in case there is an update available, tell the user that it needs a valid purchase code
	if ( empty( $purchase_code ) ) {
		$output .=  '<p>' . __( 'A <strong>valid purchase code</strong> is required for automatic updates.', 'heart-and-style' ) . '</p>';
	}
	//output errors and notifications
	if ( ! empty( $errors ) ) {
		foreach ( $errors as $key => $error ) {
			$output .= '<div class="error"><p>' . wp_kses_post( $error ) . '</p></div>';
		}
	}
	if ( ! empty( $purchase_code ) ) {
		if ( ! empty( $errors ) ) {
			//since there is already a purchase code present - notify the user
			$output .= '<p>' . esc_html__( 'Purchase code not updated. We will keep the existing one.', 'heart-and-style' ) . '</p>';
		} else {
			//this means a valid purchase code is present and no errors were found
			$output .= '<p><span class="notice notice-success notice-alt">' . __( 'Your <strong>purchase code is valid</strong>. Thank you! Enjoy one-click automatic updates.', 'heart-and-style' ) . '</span></p>';
		}
	}
	$purchase_code_key = esc_attr( strtolower( str_replace( array(' ', '.'), '_', $slug ) ) ) . '_wup_purchase_code';
	$output .= '<form class="wupdates_purchase_code" action="" method="post">' .
		'<input type="hidden" name="wupdates_pc_theme" value="' . esc_attr( $slug ) . '" />' .
		'<input type="text" id="' . $purchase_code_key . '" name="' . $purchase_code_key . '"
		        value="' . esc_attr( $purchase_code ) . '" placeholder="' . esc_html__( 'Purchase code ( e.g. 9g2b13fa-10aa-2267-883a-9201a94cf9b5 )', 'heart-and-style' ) . '"/>' . ' ' .
		__( 'Enter your purchase code and <strong>hit return/enter</strong>.', 'heart-and-style' ) . ' ' .
		__( 'Find out how to <a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank">get your purchase code</a>.', 'heart-and-style' ) .
		'</form>';

	echo $output;
}
//add_action( 'in_theme_update_message-' . basename( get_template_directory() ), 'wupdates_ms_theme_list_purchase_code_field', 10, 2 );

/**
 * Show a notice to get automatic updates
 */
function wupdates_purchase_code_needed_notice() {
	global $current_screen;

	$output = '';
	$slug = basename( get_template_directory() );
	//check if we have a purchase code saved already
	$purchase_code = sanitize_text_field( get_option( strtolower( $slug ) . '_wup_purchase_code', '' ) );
	//if the purchase code doesn't pass the prevalidation, show notice
	if ( in_array( $current_screen->id, array( 'update-core', 'update-core-network') ) && true !== wupdates_prevalidate_purchase_code( $purchase_code ) ) {
		$output .= '<div class="updated"><p>' . sprintf( __( '<a href="%s">Please enter your purchase code</a> to get automatic updates for <b>%s</b>.', 'heart-and-style' ), network_admin_url( 'themes.php?page=heart-and-style-getting-started' ), wp_get_theme( $slug ) ) . '</p></div>';
	}

	echo $output;
}
add_action( 'admin_notices', 'wupdates_purchase_code_needed_notice' );
add_action( 'network_admin_notices', 'wupdates_purchase_code_needed_notice' );

/**
 * Validate purchase code
 */
function wupdates_process_purchase_code() {
	//in case the user has submitted the purchase code form
	if ( ! empty( $_POST['wupdates_pc_theme'] ) ) {
		
		$errors = array();
		$slug = sanitize_text_field( $_POST['wupdates_pc_theme'] ); // get the theme's slug
		//PHP doesn't allow dots or spaces in $_POST keys - it converts them into underscore; so we do also
		$purchase_code_key = esc_attr( strtolower( str_replace( array(' ', '.'), '_', $slug ) ) ) . '_wup_purchase_code';
		$purchase_code = false;

		// handle username
		$custom_username = false;
		if ( empty( $_POST['wupdates_custom_username'] ) ) {
			$errors[] = 'Please supply your username.';
		} else {
			$custom_username = sanitize_text_field( $_POST['wupdates_custom_username'] );
		}

		// handle password
		$custom_email = false;
		if ( empty( $_POST['wupdates_custom_email'] ) ) {
			$errors[] = 'Please supply your email address.';
		} else {
			$custom_email = sanitize_text_field( $_POST['wupdates_custom_email'] );
		}

		// handle newsletter 
		$custom_newsletter = 'NO';
		if ( ! empty( $_POST['wupdates_custom_newsletter'] ) ) {
			$custom_newsletter = 'YES';
		}

		if ( ! empty( $_POST[ $purchase_code_key ] ) ) {
			//get the submitted purchase code and sanitize it
			$purchase_code = sanitize_text_field( $_POST[ $purchase_code_key ] );
			//do a prevalidation; no need to make the API call if the format is not right
			if ( true !== wupdates_prevalidate_purchase_code( $purchase_code ) ) {
				$purchase_code = false;
			}
		}
		if ( ! empty( $purchase_code ) ) {
			//check if this purchase code represents a sale of the theme
			$http_args = array (
				'body' => array(
					'slug' => $slug, //the theme's slug
					'url' => home_url(), //the site's home URL
					'purchase_code' => $purchase_code,
				)
			);
			
			//make sure that we use a protocol that this hosting is capable of
			$url = $http_url = set_url_scheme( 'https://wupdates.com/wp-json/wup/v1/front/check_envato_purchase_code/MnKpq', 'http' );
			if ( $ssl = wp_http_supports( array( 'ssl' ) ) ) {
				$url = set_url_scheme( $url, 'https' );
			}
			//make the call to the purchase code check API
			$raw_response = wp_remote_post( $url, $http_args );
			if ( $ssl && is_wp_error( $raw_response ) ) {
				$raw_response = wp_remote_post( $http_url, $http_args );
			}
			// In case the server hasn't responded properly, show error
			if ( is_wp_error( $raw_response ) || 200 != wp_remote_retrieve_response_code( $raw_response ) ) {
				$errors[] = __( 'We are sorry but we couldn\'t connect to the verification server. Please try again later.', 'heart-and-style' ) . '<span class="hidden">' . print_r( $raw_response, true ) . '</span>';
			} elseif ( empty ( $errors ) ) {				
				$response = json_decode( $raw_response['body'], true );
				if ( ! empty( $response ) ) {
					//we will only update the purchase code if it's valid
					//this way we keep existing valid purchase codes
					if ( isset( $response['purchase_code'] ) && 'valid' == $response['purchase_code'] ) {
						//all is good, update the purchase code option
						update_option( strtolower( $slug ) . '_wup_purchase_code', $purchase_code );
						//delete the update_themes transient so we force a recheck
						set_site_transient('update_themes', null);
						// custom process
						heart_and_style_process_activation(array(
							'username' => $custom_username,
							'email' => $custom_email,
							'theme' => $slug,
							'newsletter' => $custom_newsletter
						));
					} else {
						if ( isset( $response['reason'] ) && ! empty( $response['reason'] ) && 'out_of_support' == $response['reason'] ) {
							$errors[] = esc_html__( 'Your purchase\'s support period has ended. Please extend it to receive automatic updates.', 'heart-and-style' );
						} else {
							$errors[] = esc_html__( 'Could not find a sale with this purchase code. Please double check.', 'heart-and-style' );
						}
					}
				}
			}
		} else {
			//in case the user hasn't entered a valid purchase code
			$errors[] = esc_html__( 'Please enter a valid purchase code. Make sure to get all the characters.', 'heart-and-style' );
		}

		if ( count( $errors ) > 0 ) {
			//if we do have errors, save them in the database so we can display them to the user
			update_option( strtolower( $slug ) . '_wup_errors', $errors );
		} else {
			//since there are no errors, delete the option
			delete_option( strtolower( $slug ) . '_wup_errors' );
		}

		//redirect back to the themes page and open popup
		//wp_redirect( esc_url_raw( add_query_arg( 'theme', $slug ) ) );
		//exit;

	}

}
add_action( 'admin_init', 'wupdates_process_purchase_code' );

/**
 * Pass the purchase code ( when checking for updates )
 */
function wupdates_send_purchase_code( $optional_data, $slug ) {
	//get the saved purchase code
	$purchase_code = sanitize_text_field( get_option( strtolower( $slug ) . '_wup_purchase_code', '' ) );

	if ( null === $optional_data ) { //if there is no optional data, initialize it
		$optional_data = array();
	}
	//add the purchase code to the optional_data so we can check it upon update check
	//if a theme has an Envato item selected, this is mandatory
	$optional_data['envato_purchase_code'] = $purchase_code;

	return $optional_data;
}
add_filter( 'wupdates_call_data_request', 'wupdates_send_purchase_code', 10, 2 );

/** 
 * Validate the format of the purchase code
 */
function wupdates_prevalidate_purchase_code( $purchase_code ) {
	$purchase_code = preg_replace( '#([a-z0-9]{8})-?([a-z0-9]{4})-?([a-z0-9]{4})-?([a-z0-9]{4})-?([a-z0-9]{12})#', '$1-$2-$3-$4-$5', strtolower( $purchase_code ) );
	if ( 36 == strlen( $purchase_code ) ) {
		return true;
	}
	return false;
}

/* End of Envato checkup code */

function ws_register_images_field() {
    register_rest_field( 
        'post',
        'images',
        array(
            'get_callback'    => 'ws_get_images_urls',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

add_action( 'rest_api_init', 'ws_register_images_field' );

function ws_get_images_urls( $object, $field_name, $request ) {
    $medium = wp_get_attachment_image_src( get_post_thumbnail_id( $object->id ), 'medium' );
    $medium_url = $medium['0'];

    $large = wp_get_attachment_image_src( get_post_thumbnail_id( $object->id ), 'large' );
    $large_url = $large['0'];

    return array(
        'medium' => $medium_url,
        'large'  => $large_url,
    );
}

function my_allow_meta_query( $valid_vars ) {
$valid_vars = array_merge( $valid_vars, array( 'meta_key', 'meta_value' ) );
return $valid_vars;
}
add_filter( 'rest_query_vars', 'my_allow_meta_query' );



add_action('rest_api_init', 'register_myapi_endpoints');
function register_myapi_endpoints() {
register_rest_route('custom-api', '/posts-ordered/', array(
'methods' => 'GET',
'callback' => 'posts_ordered'
));
}

function posts_ordered($request) {
 $posts= '';
  $slug = explode(',',$request['slug']); 
  if(isset($slug[0]) && $slug[0] == ''){
  	if($slug[1] == 'feature'){
  	$args = array(
        'post_type'  => 'post',
        'meta_key'   => '_is_ns_featured_post',
        'meta_value' => 'yes',
        'post_status'=> 'publish',
		'posts_per_page'=> -1
    );
   }
   if($slug[1] == 'all'){
   	$args = array(
        'post_type'  => 'post',
       // 'meta_key'   => '_is_ns_featured_post',
        'meta_value' => 'yes',
        'post_status'=> 'publish',
		'posts_per_page'=> -1
    );
   }
  }else{
  	if($slug[1] == 'feature'){
   $args = array(
        'post_type'  => 'post',
       'meta_key'   => '_is_ns_featured_post',
        'meta_value' => 'yes',
        "tax_query" => array(
		array(
			"taxonomy" => "category",
			"field"    => "slug",
			"terms"    => $slug[0],
		 )
	   ),
        'post_status'=> 'publish',
		'posts_per_page'=> -1
    );
  }
  if($slug[1] == 'all'){
  	 $args = array(
       'post_type'  => 'post',
       // 'meta_key'   => '_is_ns_featured_post',
        'meta_value' => 'yes',
        "tax_query" => array(
		array(
			"taxonomy" => "category",
			"field"    => "slug",
			"terms"    => $slug[0],
		 )
	   ),
        'post_status'=> 'publish',
		'posts_per_page'=> -1
    );
   }
 }

$posts = get_posts($args);


$arr1 = array();
	$i=0; 
foreach ($posts as $postz){
	
		$image = wp_get_attachment_url( get_post_thumbnail_id($postz->ID) );
         $getCategoryID =   get_the_category( $postz->ID );
         $catList = array();
         foreach($getCategoryID as $cat){ 
         	$catlist['term_id'] = $cat->term_id;
            $catlist['name'] = $cat->name;
         	$catList[] = $catlist;
         } 
		 $arr1[$i]["id"]= $postz->ID;
		 $arr1[$i]["post_date"]= $postz->post_date;
		 $arr1[$i]["post_title"]= $postz->post_title;
		 //$arr1[$i]["category_list"]= $catList;
		 $arr1[$i]["image"]= $image;
		 $content = $postz->post_content;
	     $arr1[$i]["description"]= $content;
	     $arr1[$i]["url"]= $postz->guid;
	
	$i++;
	}
wp_send_json($arr1);	
	
}

add_action( 'save_post', 'override_feature_meta', 999 );
function override_feature_meta($post_id) {
$featured_value = '';
if ( isset( $_POST['nsfp_settings']['make_this_featured'] ) && 'yes' == $_POST['nsfp_settings']['make_this_featured'] ) {
$featured_value = 'yes';
}
if ( 'yes' !== $featured_value ) {
update_post_meta( $post_id, '_is_ns_featured_post', 'no' );
}
return $post_id;
}
