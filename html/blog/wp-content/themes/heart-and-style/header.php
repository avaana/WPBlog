<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	
	<!-- Meta -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Link -->
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!-- WP Head -->
	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

	<div id="page" class="site">

		<?php

			$header_classes = 'site-header no-col-spacing ';
			$header_shadow = heart_and_style_get_theme_mod( 'header_drop_shadow', 'enabled' ); 
			if ( $header_shadow == 'enabled' ) {
				$header_classes.= 'header-drop-shadow ';
			}

		?>

		<?php
			// Logo Position
			$logo_position = heart_and_style_get_theme_mod( 'logo_position', 'inline_left' );
				
			$header_classes .= 'header-logo-pos-' . $logo_position . ' ';

			// Navigation class
			$navigation_class = 'col col-4 ';
			if ( $logo_position == 'below_center' ) {
				$navigation_class = 'float-left';
			}
		?>

		<header id="header" class="<?php echo esc_attr( $header_classes ); ?>">

			<div class="wrapper clearfix">

				<?php if ( $logo_position == 'inline_left' ) { get_template_part( 'template-parts/header/logo' ); } ?>

				<nav id="navigation" class="<?php echo esc_attr( $navigation_class ); ?>">
					
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'fallback_cb' => false ) ); ?>

				</nav><!-- #navigation -->

				<?php if ( $logo_position == 'inline_center' ) { get_template_part( 'template-parts/header/logo' ); } ?>

				<?php get_template_part( 'template-parts/header/social' ); // powered by template-parts/header/social.php ?>

			</div><!-- .wrapper -->
			
		</header><!-- #header -->

		<?php if ( $logo_position == 'below_center' ) : ?>
			<?php get_template_part( 'template-parts/header/logo' ); ?>
		<?php endif; ?>

		<?php get_template_part( 'template-parts/header/tagline' ); // powered by template-parts/header/tagline.php ?>

		<?php get_template_part( 'template-parts/header/slider' ); // powered by template-parts/header/slider.php ?>

		<?php get_template_part( 'template-parts/header/carousel' ); // powered by template-parts/header/carousel.php ?>

		<?php get_template_part( 'template-parts/header/posts' ); // powered by template-parts/header/posts.php ?>

		<?php get_template_part( 'template-parts/main/subscribe' ); // powered by template-parts/header/subscribe.php ?>

		<div id="main" class="site-content">

			<div class="wrapper clearfix">
