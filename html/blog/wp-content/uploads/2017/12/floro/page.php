<?php
/**
 * The template for default pages
 *
 * @package Floro
 * @since Floro 1.0
 */

get_header(); ?>

	<div id="content" class="col col-8 single-content" role="main">

		<?php

			// Loop posts
			while ( have_posts() ) : the_post();

				// Output from template
				get_template_part( 'template-parts/content', 'page' );

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
