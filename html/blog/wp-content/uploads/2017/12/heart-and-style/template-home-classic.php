<?php
/**
 * Template Name: Home - Classic
 */
?>

<?php get_header(); ?>

	<div id="content" class="col col-8">

		<?php 

			// Current page
			if( is_front_page() ) { $paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1; } else { $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; }

			// Query args
			$args = array(
				'posts_per_page' => 7,
				'paged' => $paged,
			);

			// Query args( posts per page )
			if ( heart_and_style_get_post_meta( get_the_ID(), 'query_posts_per_page' ) ) {
				$args['posts_per_page'] = heart_and_style_get_post_meta( get_the_ID(), 'query_posts_per_page' );
			}

			// Query posts
			$heart_and_style_query = new WP_Query( $args );

			// If there are posts
			if ( $heart_and_style_query->have_posts() ) :

				// Amount of pages
				$num_pages = $heart_and_style_query->max_num_pages;

				?><div class="blog-posts-listing blog-posts-listing-classic"><?php

					?><div class="blog-posts-listing-inner clearfix"><?php

						// Loop posts
						while ( $heart_and_style_query->have_posts() ) : $heart_and_style_query->the_post();

							// Output from template
							get_template_part( 'template-parts/content-classic', get_post_format() );

						endwhile;

					?></div><!-- .blog-posts-listing-inner --><?php

					// Post navigation
					heart_and_style_posts_pagination( array( 'pages' => $num_pages ) );

				?></div><!-- .blog-posts-listing --><?php

			// If no posts found
			else :

				// Output from template
				get_template_part( 'template-parts/content', 'none' );

			// Finish if statement
			endif; 

			// Reset query
			wp_reset_postdata();

		?>

	</div><!-- #content -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>