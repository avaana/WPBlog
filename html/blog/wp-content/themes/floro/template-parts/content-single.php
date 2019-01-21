<?php
/**
 * The template part for displaying content on a single post
 *
 * @package Floro
 * @since Floro 1.0
 */
?>

<?php if ( has_post_thumbnail() ) : ?>
	<div class="blog-post-single-thumb">
		<?php the_post_thumbnail( 'floro-posts-listing' ); ?>
	</div><!-- .blog-post-single-thumb -->
<?php endif; ?>

<h1 class="blog-post-single-title"><?php the_title(); ?></h1>

<?php if ( has_excerpt() ) : ?>
	<div class="blog-post-single-excerpt">
		<?php the_excerpt(); ?>
	</div><!-- .blog-post-single-excert -->
<?php endif; ?>

<div class="blog-post-single-meta clearfix">

	<div class="blog-post-single-meta-info">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), 35 ); ?> <?php esc_html_e( 'By', 'floro' ); ?> <span class="blog-post-single-meta-info-author"><?php the_author_posts_link(); ?></span> <?php esc_html_e( 'in', 'floro' ); ?> <span class="blog-post-single-meta-info-cats"><?php the_tags( '', ', ', '' ); ?></span>
	</div><!-- .blog-post-single-meta-info -->

	<div class="blog-post-single-meta-social">

		<div class="blog-post-share">

			<a href="<?php comments_link(); ?>"><span class="fa fa-comments"></span><span class="blog-post-share-count"><?php comments_number( esc_html__( 'No comments', 'floro' ), esc_html__( 'One comment', 'floro' ), esc_html__( '% comments', 'floro' ) ); ?></span></a>

		</div><!-- .blog-post-share -->

	</div><!-- .blog-post-single-meta-social -->

</div><!-- .blog-post-meta -->

<div class="blog-post-single-content">
	<?php the_content(); ?>
</div><!-- .blog-post-single-content -->

<div class="blog-post-single-pagination">
	<?php wp_link_pages( array( 'link_before' => '<span class="blog-post-single-pagination-item">', 'link_after' => '</span>' ) ); ?>
</div><!-- .blog-post-single-pagination -->

<span class="floro-count-views" data-post-id="<?php the_ID(); ?>"></span>