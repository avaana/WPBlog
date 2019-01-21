<?php
	/* Outputs the featured posts slider on homepage */
?>

<?php

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

<?php if ( $is_home && heart_and_style_get_theme_mod( 'slider_state', 'disabled' ) == 'enabled' ) : ?>

	<?php

		// Get amount of posts per page
		$posts_per_page = heart_and_style_get_theme_mod( 'slider_posts_amount', -1 );

		// Query arguments
		$query_args = array(
			'post_type' => 'post',
			'posts_per_page' => $posts_per_page,
			'tax_query' => array(
				array(
					'taxonomy' => 'post_tag',
					'field'    => 'slug',
					'terms'    => 'slider',
				),
			),
		);

		// Do the query
		$heart_and_style_query = new WP_Query( $query_args );

	?>

	<?php if ( $heart_and_style_query->have_posts() ) : ?>

		<div id="featured-posts-slider">

			<div class="wrapper position-relative">

				<div class="blog-posts-slider blog-posts-slider-amount-<?php echo esc_attr( $posts_per_page ); ?>">

					<?php while ( $heart_and_style_query->have_posts() ) : $heart_and_style_query->the_post(); ?>

						<div class="blog-post-slider">

							<div class="blog-post-slider-thumb">
								<?php
									$thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); 
									$thumb_url = $thumb_url[0];
									$res_img = heart_and_style_aq_resize( $thumb_url, 1084, 550, true );
									$img_alt = heart_and_style_get_attachment_alt( get_post_thumbnail_id() );
								?>
								<img src="<?php echo esc_url( $res_img ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>" />
								<div class="blog-post-slider-thumb-overlay"></div>
							</div><!-- .blog-post-slider-thumb -->

							<div class="blog-post-slider-main">
								
								<?php if ( has_category() && heart_and_style_get_theme_mod( 'slider_category_state', 'enabled' ) == 'enabled' ) : ?>
									<div class="blog-post-slider-cats">
										<?php the_category( ' ' ); ?>
									</div><!-- .blog-post-slider-cats -->
								<?php endif; ?>

								<?php if ( heart_and_style_get_theme_mod( 'slider_title_state', 'enabled' ) == 'enabled' ) : ?>

									<div class="blog-post-slider-title">
										<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									</div><!-- .blog-post-slider-title -->		

								<?php endif; ?>	

								<?php if ( heart_and_style_get_theme_mod( 'slider_excerpt_state', 'enabled' ) == 'enabled' ) : ?>

									<div class="blog-post-slider-excerpt">
										<?php 
											if ( heart_and_style_get_post_meta( get_the_ID(), 'banner_tagline' ) ) {
												echo heart_and_style_get_post_meta( get_the_ID(), 'banner_tagline' );
											} else {
												the_excerpt();
											}
										?>
									</div><!-- .blog-post-slider-excerpt -->

								<?php endif; ?>

								<?php if ( heart_and_style_get_theme_mod( 'slider_button_state', 'enabled' ) == 'enabled' ) : ?>

									<div class="blog-post-slider-read-more">
										<a href="<?php the_permalink(); ?>"><?php _e( 'CONTINUE READING', 'heart-and-style' ); ?></a>
									</div><!-- .blog-post-slider-read-more -->

								<?php endif; ?>

							</div><!-- .blog-post-slider-main -->

						</div><!-- .blog-post-slider -->

					<?php endwhile; ?>

				</div><!-- .blog-posts-slider -->

				<span class="blog-posts-slider-nav-prev"></span>
				<span class="blog-posts-slider-nav-next"></span>

				<div class="blog-posts-slider-loader">
					<svg xmlns="http://www.w3.org/2000/svg" 
						width="80px" height="60px"
						viewBox="5 0 80 60">
						<path d="M 0 37.5 c 7.684299348848887 0 7.172012725592294 -15 15 -15 s 7.172012725592294 15 15 15 s 7.172012725592294 -15 15 -15 s 7.172012725592294 15 15 15 s 7.172012725592294 -15 15 -15 s 7.172012725592294 15 15 15 s 7.172012725592294 -15 15 -15 s 7.172012725592294 15 15 15 s 7.172012725592294 -15 15 -15 s 7.172012725592294 15 15 15 s 7.172012725592294 -15 15 -15 s 7.172012725592294 15 15 15 s 7.172012725592294 -15 15 -15 s 7.172012725592294 15 15 15 s 7.172012725592294 -15 15 -15"
							id="wave" 
							fill="none" 
							stroke="#ed6260" 
							stroke-width="2"
							stroke-linecap="round">
						</path>
					</svg>
				</div>

			</div><!-- .wrapper -->

		</div><!-- #featured-posts-slider -->

	<?php endif; ?>

	<?php wp_reset_postdata(); ?>

<?php endif; ?>