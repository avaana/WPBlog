<?php
/**
 * Template for the header
 *
 * @package Floro
 * @since Floro 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<div id="page" class="site">

		<header id="header">

			<div class="wrapper clearfix">

				<?php get_template_part( 'template-parts/header/logo' ); ?>

				<?php get_template_part( 'template-parts/header/navigation' ); ?>				

				<?php get_template_part( 'template-parts/header/social' ); ?>

			</div><!-- .wrapper -->
			
		</header><!-- #header -->

		<div id="main" class="site-content">

			<div class="wrapper clearfix">
