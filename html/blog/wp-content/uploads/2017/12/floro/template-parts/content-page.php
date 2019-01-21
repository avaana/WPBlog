<?php
/**
 * The template part for displaying content on a single page
 *
 * @package Floro
 * @since Floro 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<h1 class="page-title"><?php the_title(); ?></h1>

	<?php the_content(); ?>

	<div class="page-pagination">
		<?php wp_link_pages( array( 'link_before' => '<span class="page-pagination-item">', 'link_after' => '</span>' ) ); ?>
	</div><!-- .page-pagination -->

</article><!-- #post-## -->
