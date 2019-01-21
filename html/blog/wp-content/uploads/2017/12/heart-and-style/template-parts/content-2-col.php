<?php
	
	global $heart_and_style_post_class;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post col col-6 ' . $heart_and_style_post_class ); ?>>

	<?php if ( has_category() ) : ?>
		<div class="blog-post-cats">
			<?php the_category( ' ' ); ?>
		</div><!-- .blog-post-cats -->
	<?php endif; ?>

	<div class="blog-post-title">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</div><!-- .blog-post-title -->			

	<div class="blog-post-meta">
		<?php _e( 'By', 'heart-and-style' ); ?> <?php the_author_posts_link(); ?> <?php _e( 'on', 'heart-and-style' ); ?> <?php the_time( get_option( 'date_format' ) ); ?>
	</div><!-- .blog-post-cats -->

	<?php if ( has_post_thumbnail() ) : ?>

		<div class="blog-post-thumb">
			<?php
				$thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); 
				$thumb_url = $thumb_url[0];
				$res_img = heart_and_style_aq_resize( $thumb_url, 600, 400, true );

				$img_alt = heart_and_style_get_attachment_alt( get_post_thumbnail_id() );
			?>
			<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( $res_img ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>" /></a>
		</div><!-- .blog-post-thumb -->

	<?php endif; ?>

	<div class="blog-post-excerpt">
		<?php the_excerpt(); ?>
	</div><!-- .blog-post-excerpt -->

	<div class="blog-post-read-more">
		<a href="<?php the_permalink(); ?>"><?php _e( 'CONTINUE READING', 'heart-and-style' ); ?></a>
	</div><!-- .blog-post-read-more -->

	<div class="clearfix">

		<?php if ( has_tag() ) : ?>
			<?php
				$tags = wp_get_post_terms( get_the_ID(), 'post_tag' );
			 	$tags_output = ' ';
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
			 <?php if ( $tags_output != ' ' ) : ?>
				<div class="blog-post-tags">
					 <?php _e( 'Posted In:', 'heart-and-style' ); echo $tags_output; ?>
				</div><!-- .blog-post-tags -->
			<?php endif; ?>

		<?php endif; ?>

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

	</div><!-- .clearfix -->

</article><!-- .blog-post -->
