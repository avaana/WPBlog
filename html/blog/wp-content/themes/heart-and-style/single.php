<?php get_header(); ?>

	<div id="content" class="col col-8 single-content">

		<?php

			// Loop posts
			while ( have_posts() ) : the_post();

				// Output content
				get_template_part( 'template-parts/content-single', get_post_format() );

				// Output about author
				get_template_part( 'template-parts/main/about-author' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			endwhile;
		?>

	</div><!-- #content -->

	<?php get_sidebar(); ?>

<?php get_footer();
