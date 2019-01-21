<?php
	/* Outputs the featured posts section on homepage just below the slider area. */
?>

<?php
	
	// If home or a page with the home template
	$is_home = false;

	// If the regular homepage
	if ( is_home() ) {
		$is_home = true;
	}

	// If template that's homepage
	if ( strpos( get_page_template_slug( get_the_ID() ), 'template-home' ) !== false ) {
		$is_home = true;
	}

?>

<?php if ( $is_home && heart_and_style_get_theme_mod( 'featured_posts_state', 'enabled' ) == 'enabled' ) : ?>

	<div id="header-posts">

		<div class="wrapper">

			<?php
				// Attributes
				$args = array(
					'location' => 'header_posts',
					'heading_title' => heart_and_style_get_theme_mod( 'featured_post_heading_title_text', 'Featured Posts' ),
					'heading_link_url' => heart_and_style_get_theme_mod( 'featured_post_heading_link_url', '#' ),
					'heading_link_title' => heart_and_style_get_theme_mod( 'featured_post_heading_link_text', 'Read More' ),
					'query_args' => array(
						'posts_per_page' => 4,
						'tax_query' => array(
							array(
								'taxonomy' => 'post_tag',
								'field' => 'slug',
								'terms' => 'featured',
							),
						),
					),
				);

				// Apply Filters
				$args = apply_filters( 'heart_and_style_footer_posts_args', $args );

				// Display
				heart_and_style_posts_alternate( $args );
			?>	

		</div><!-- .wrapper -->

	</div><!-- #header-posts -->

<?php endif; ?>