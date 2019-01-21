<?php if ( heart_and_style_get_theme_mod( 'footer_bottom_state', 'enabled' ) == 'enabled' ) : ?>

	<div id="footer-bottom">
		
		<div class="wrapper clearfix">
			
			<div id="footer-navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu', 'fallback_cb' => false ) ); ?>
			</div><!-- #footer-navigation -->

			<div id="footer-copyright">
				<?php echo heart_and_style_get_theme_mod( 'footer_copy_text', 'Designed & Developed by <a href="http://meridianthemes.net/" rel="nofollow">MeridianThemes</a>' ); ?>
			</div><!-- #footer-copyright -->

		</div><!-- .wrapper -->

	</div><!-- #footer-bottom -->

<?php endif; ?>