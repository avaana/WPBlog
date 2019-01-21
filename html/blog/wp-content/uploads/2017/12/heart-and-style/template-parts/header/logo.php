<?php

// Logo Position
$logo_position = heart_and_style_get_theme_mod( 'logo_position', 'inline_left' );

// Default logo image
$logo_img_default = get_template_directory_uri() . '/images/logo-white.png';
if ( $logo_position == 'inline_left' ) { $logo_img_default = get_template_directory_uri() . '/images/logo-white.png'; }
if ( $logo_position == 'inline_center' ) { $logo_img_default = get_template_directory_uri() . '/images/logo.png'; }
if ( $logo_position == 'below_center' ) { $logo_img_default = get_template_directory_uri() . '/images/logo-below.png'; }
$logo_img_src = heart_and_style_get_theme_mod( 'logo', $logo_img_default );
$logo_img_retina_src = heart_and_style_get_theme_mod( 'logo_retina', '' );

// Logo class
$logo_class = 'col col-4 ';
if ( $logo_position == 'below_center' || $logo_position == 'below_left' ) {
	$logo_class = '';
}
$logo_class .= 'logo-position-' . $logo_position;

// Logo image class
$logo_img_class = '';
if ( $logo_img_retina_src !== '' ) {
	$logo_img_class = 'has-retina-ver';
}

?>
	<div id="logo" class="<?php echo esc_attr( $logo_class ); ?>">
		<?php if ( $logo_position == 'below_center' ) : ?><div class="wrapper"><?php endif; ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img class="<?php echo esc_attr( $logo_img_class );?>" src="<?php echo esc_attr( $logo_img_src ); ?>" data-retina-ver="<?php echo esc_attr( $logo_img_retina_src ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" /></a>
		<?php if ( $logo_position == 'below_center' ) : ?></div><!-- .wrapper --><?php endif; ?>
	</div><!-- #logo -->