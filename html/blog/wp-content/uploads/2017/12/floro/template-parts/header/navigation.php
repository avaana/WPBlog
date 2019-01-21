<?php
/**
 * The template part for displaying the primary navigation
 *
 * @package Floro
 * @since Floro 1.0
 */
?>
<?php if ( has_nav_menu( 'primary' ) ) : ?>
	<nav id="navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'fallback_cb' => false ) ); ?>
	</nav><!-- #navigation -->
<?php endif; ?>