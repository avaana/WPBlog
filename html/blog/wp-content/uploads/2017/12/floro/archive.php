<?php
/**
 * The template for displaying archive pages
 *
 * @package Floro
 * @since Floro 1.0
 */

get_header(); ?>

	<div id="content" class="col col-8" role="main">

		<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>

		<?php 

			// If there are posts
			if ( have_posts() ) :

				?><div class="blog-posts-listing"><?php				

					// Loop posts
					while ( have_posts() ) : the_post();

						// Output from template
						get_template_part( 'template-parts/content', get_post_format() );

					// End loop posts
					endwhile;

					// Previous/next pagination
					the_posts_pagination( array(
						'prev_text'          => esc_html__( 'Previous', 'floro' ),
						'next_text'          => esc_html__( 'Next', 'floro' ),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'floro' ) . ' </span>',
					) );

				?></div><!-- .blog-posts-listing --><?php

			// If no posts found
			else :

				// Output from template
				get_template_part( 'template-parts/content', 'none' );

			// Finish if statement
			endif; 

		?>

	</div><!-- #content -->

	<?php get_sidebar(); ?>

<?php get_footer();
