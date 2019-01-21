<?php
/**
 * The template part for displaying the header logo
 *
 * @package Floro
 * @since Floro 1.0
 */
?>
<div id="logo">
	<?php floro_the_custom_logo(); ?>
	<?php if ( is_front_page() && is_home() ) : ?>
		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	<?php else : ?>
		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
	<?php endif; ?>
</div><!-- #logo -->