<?php
/**
 * The template part for displaying post in a posts listing
 *
 * @package Floro
 * @since Floro 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>

	<?php if ( has_category() ) : ?>
		<div class="blog-post-cats">
			<?php the_category( ' ' ); ?>
		</div><!-- .blog-post-cats -->
	<?php endif; ?>

	<div class="blog-post-title">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</div><!-- .blog-post-title -->			

	<div class="blog-post-meta">
		<?php esc_html_e( 'By', 'floro' ); ?> <?php the_author_posts_link(); ?> <?php esc_html_e( 'on', 'floro' ); ?> <?php the_time( get_option( 'date_format' ) ); ?>
	</div><!-- .blog-post-cats -->

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="blog-post-thumb">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'floro-posts-listing' ); ?></a>
		</div><!-- .blog-post-thumb -->
	<?php endif; ?>

	<div class="blog-post-excerpt">
		<?php the_excerpt(); ?>
	</div><!-- .blog-post-excerpt -->

	<div class="blog-post-read-more">
		<a href="<?php the_permalink(); ?>"><?php esc_html_e( 'CONTINUE READING', 'floro' ); ?></a>
	</div><!-- .blog-post-read-more -->

	<div class="clearfix">

		<?php if ( has_tag() ) : ?>
			<div class="blog-post-tags">
				 <?php esc_html_e( 'Posted In:', 'floro' ); ?> <?php the_tags( '', ', ', '' ); ?>
			</div><!-- .blog-post-tags -->
		<?php endif; ?>

		<div class="blog-post-share">
			<a href="<?php comments_link(); ?>"><span class="fa fa-comments"></span><span class="blog-post-share-count"><?php comments_number( esc_html__( 'No comments', 'floro' ), esc_html__( 'One comment', 'floro' ), esc_html__( '% comments', 'floro' ) ); ?></span></a>
		</div><!-- .blog-post-share -->

	</div><!-- .clearfix -->

</article><!-- .blog-post -->
