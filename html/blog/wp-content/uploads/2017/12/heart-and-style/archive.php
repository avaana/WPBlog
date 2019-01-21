<?php get_header(); ?>

	<div id="content" class="col col-8">

		<?php 

			// If there are posts
			if ( have_posts() ) :

				?><div class="blog-posts-listing"><?php

					?><div class="blog-posts-listing-inner"><?php

						// Loop posts
						while ( have_posts() ) : the_post();

							// Output from template
							get_template_part( 'template-parts/content', get_post_format() );

						endwhile;

					?></div><!-- .blog-posts-listing-inner --><?php

					// Post navigation
					heart_and_style_posts_pagination();

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
