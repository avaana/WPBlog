<?php
	/* Outputs on a single post page */
?>

<?php if ( has_excerpt() ) : ?>
	<div class="blog-post-single-excerpt">
		<?php the_excerpt(); ?>
	</div><!-- .blog-post-single-excert -->
<?php endif; ?>

<div class="blog-post-single-meta clearfix">

	<?php $tags_output = ' '; ?>
	<?php if ( has_tag() ) : ?>
		<?php
			$tags = wp_get_post_terms( get_the_ID(), 'post_tag' );
		 	$count = 0;
		 	foreach ( $tags as $tag ) {
		 		if ( ! in_array( $tag->slug, array( 'featured', 'slider' ) ) ) {
			 		$count++;
			 		if ( $count > 1 ) {
			 			$tags_output .= ', ';
			 		}
			 		$tags_output .= '<a href="' . get_term_link( $tag, 'post_tag' ) . '">' . $tag->name . '</a>';
			 	}
		 	}
		 ?>
	<?php endif; ?>

	<div class="blog-post-single-meta-info">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), 35 ); ?> By <span class="blog-post-single-meta-info-author"><?php the_author_posts_link(); ?></span> <?php if ( $tags_output != ' ' ) : ?>in <span class="blog-post-single-meta-info-cats"><?php echo $tags_output; ?><?php endif; ?></span>
	</div><!-- .blog-post-single-meta-info -->

	<div class="blog-post-single-meta-social">
		
		<?php
			$share_info = heart_and_style_get_social_count();
			$post_img = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
			$share_status = esc_attr( get_the_title( get_the_ID() ) . ' ' . get_permalink( get_the_ID() ) );
		?>

		<div class="blog-post-share">

			<a href="#" target="_blank" onClick="return heart_and_style_social_share(400, 300, 'http://www.facebook.com/share.php?u=<?php echo get_permalink( get_the_ID() ); ?>')"><span class="fa fa-facebook"></span><span class="blog-post-share-count"><?php if ( $share_info ) { echo esc_html( $share_info['fb'] ); } ?></span></a>
			<a href="#" onClick="return heart_and_style_social_share(400, 300, 'https://twitter.com/home?status=<?php echo esc_html( $share_status ); ?>')" ><span class="fa fa-twitter"></span><span class="blog-post-share-count"><?php if ( $share_info ) { echo esc_html( $share_info['twitter'] ); } ?></span></a>
			<a href="#" onClick="return heart_and_style_social_share(400, 300, 'https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php echo esc_html( $post_img ); ?>&amp;description=<?php echo esc_attr( get_the_excerpt() ); ?>')"><span class="fa fa-pinterest"></span><span class="blog-post-share-count"><?php if ( $share_info ) { echo esc_html( $share_info['pinterest'] ); } ?></span></a>
			<a href="<?php comments_link(); ?>"><span class="fa fa-comments"></span><span class="blog-post-share-count"><?php comments_number( __( 'No comments', 'heart-and-style' ), __( 'One comment', 'heart-and-style' ), __( '% comments', 'heart-and-style' ) ); ?></span></a>

		</div><!-- .blog-post-share -->

	</div><!-- .blog-post-single-meta-social -->

</div><!-- .blog-post-meta -->

<div class="blog-post-single-content">
	<?php the_content(); ?>
</div><!-- .blog-post-single-content -->

<div class="blog-post-single-pagination">
	<?php wp_link_pages(); ?>
</div><!-- .blog-post-single-pagination -->

<span class="heart-and-style-count-views" data-post-id="<?php the_ID(); ?>">