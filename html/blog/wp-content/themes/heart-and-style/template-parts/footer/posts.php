<?php
	/* Outputs the popular posts section in footer. */
?>

<?php if ( heart_and_style_get_theme_mod( 'popular_posts_state', 'enabled' ) == 'enabled' ) : ?>

	<div id="footer-posts">

		<div class="wrapper">

			<?php
				// Attributes
				$args = array(
					'location' => 'footer_posts',
					'heading_title' => heart_and_style_get_theme_mod( 'popular_post_heading_title_text', 'Popular Posts' ),
					'heading_link_url' => heart_and_style_get_theme_mod( 'popular_post_heading_link_url', '#' ),
					'heading_link_title' => heart_and_style_get_theme_mod( 'popular_post_heading_link_text', 'Read More' ),
					'query_args' => array(
						'orderby' => 'comment_count',
						'posts_per_page' => heart_and_style_get_theme_mod( 'popular_posts_amount', '4' ),
					),
				);

				// Apply Filters
				$args = apply_filters( 'heart_and_style_footer_posts_args', $args );

				// Display
				heart_and_style_posts_alternate( $args );
			?>	

		</div><!-- .wrapper -->

	</div><!-- #footer-posts -->

<?php endif; ?>