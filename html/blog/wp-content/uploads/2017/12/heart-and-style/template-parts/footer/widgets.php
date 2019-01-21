<?php if ( is_active_sidebar( 'sidebar-2' ) && heart_and_style_get_theme_mod( 'footer_widgets_state', 'enabled' ) == 'enabled'  ) : ?>

	<div id="footer-widgets">
		
		<div class="wrapper clearfix">
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div><!-- .wrapper -->

	</div><!-- #footer-widgets -->

<?php endif; ?>