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

<?php if ( $is_home && heart_and_style_get_theme_mod( 'carousel_state', 'enabled' ) == 'enabled' ) : ?>
	
	<?php

	// Get amount of posts per page
	$posts_per_page = heart_and_style_get_theme_mod( 'carousel_posts_amount', -1 );

	// Query arguments
	$query_args = array(
		'post_type' => 'post',
		'posts_per_page' => -1,
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

	// Vars
	$count = 0;
	$real_count = 0;

	// Type
	$type = 'carousel';
	//$type = 'custom';

	?>

	<?php if ( $heart_and_style_query->have_posts() ) : ?>

		<div id="blog-posts-carousel">
			
			<div class="wrapper">

				<div class="blog-posts-carousel clearfix">
				
					<?php while ( $heart_and_style_query->have_posts() ) : $heart_and_style_query->the_post(); $count++; $real_count++; ?>

						<?php

							// Classes
							$class_slide = 'blog-post-carousel blog-post-carousel-hovered col col-4 blog-post-carousel-num-' . $count . ' ';
							$extra_class = '';

							// Vars
							$slides_per_page = 3;
							if ( $count == $slides_per_page ) {
								$count = 0;
							}

							// Visible at start
							if ( $real_count <= $slides_per_page ) {
								$extra_class .= 'blog-post-carousel-visible ';
							}

						?>

						<div class="<?php echo esc_attr( $class_slide . $extra_class ); ?>">

							<div class="blog-post-carousel-inner">

								<div class="blog-post-carousel-front">

									<?php
										$thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); 
										$thumb_url = $thumb_url[0];
										$res_img = heart_and_style_aq_resize( $thumb_url, 600, 850, true );
										$img_alt = heart_and_style_get_attachment_alt( get_post_thumbnail_id() );
									?>
									<img src="<?php echo esc_url( $res_img ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>" />

									<div class="blog-post-carousel-front-overlay"></div>

									<div class="blog-post-carousel-front-main">

										<?php if ( has_category() && heart_and_style_get_theme_mod( 'carousel_title_state', 'enabled' ) == 'enabled' ) : ?>										
											<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
										<?php endif; ?>

										<?php if ( has_category() && heart_and_style_get_theme_mod( 'carousel_category_state', 'enabled' ) == 'enabled' ) : ?>

											<div class="blog-post-carousel-front-cats">
												<?php the_category( ' ' ); ?>
											</div>

										<?php endif; ?>

									</div><!-- .blog-post-carousel-front-main -->

								</div><!-- .blog-post-carousel-front -->

								<div class="blog-post-carousel-back">

									<img src="<?php echo esc_url( $res_img ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>" />

									<div class="blog-post-carousel-back-overlay"></div>

									<div class="blog-post-carousel-back-main">
										
										<h2><?php the_title(); ?></h2>

										<div class="blog-post-carousel-meta">
											By <?php the_author_posts_link(); ?>
										</div>

										<div class="blog-post-carousel-excerpt">
											<?php echo wp_trim_words( get_the_excerpt(), 30 ); ?>
										</div>

									</div><!-- .blog-post-carousel-back-main -->

									<div class="blog-post-carousel-read-more">
										<a href="<?php the_permalink(); ?>"><?php _e( 'Read More', 'heart-and-style' ); ?></a>
									</div>

								</div><!-- .blog-post-carousel-back -->

							</div><!-- .blog-post-carousel-inner -->

						</div><!-- .blog-post-carousel -->

					<?php endwhile; ?>

				</div><!-- .blog-posts-carousel -->

				<span class="blog-posts-carousel-nav-prev"></span>
				<span class="blog-posts-carousel-nav-next"></span>

				<div class="blog-posts-carousel-loader">
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

		</div><!-- #blog-posts-carousel -->

	<?php endif; ?>

	<?php wp_reset_postdata(); ?>
	
<?php endif; ?>