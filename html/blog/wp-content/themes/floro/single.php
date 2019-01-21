<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package Floro
 * @since Floro 1.0
 */

get_header(); ?>

	<div id="content" class="col col-8 single-content" role="main">

		<?php

			// Loop posts
			while ( have_posts() ) : the_post();

				// Output content
				get_template_part( 'template-parts/content-single', get_post_format() );

				// Prev/next posts
				get_template_part( 'template-parts/main/prev-next-posts' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			// End loop posts
			endwhile;
		?>

	</div><!-- #content -->

	<?php get_sidebar(); ?>

<?php get_footer();
