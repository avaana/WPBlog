<?php
/**
 * The template part for displaying the bottom of the footer
 *
 * @package Floro
 * @since Floro 1.0
 */
?>
<div id="footer-bottom">
	
	<div class="wrapper clearfix">
		
		<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<div id="footer-navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu', 'fallback_cb' => false ) ); ?>
			</div><!-- #footer-navigation -->
		<?php endif; ?>

		<div id="footer-copyright">
			<?php printf( esc_html__( '%1$s by %2$s', 'floro' ), 'Floro', '<a href="http://meridianthemes.net" rel="nofollow" target="_blank">Meridian Themes</a>' ); ?>
		</div><!-- #footer-copyright -->

	</div><!-- .wrapper -->

</div><!-- #footer-bottom -->