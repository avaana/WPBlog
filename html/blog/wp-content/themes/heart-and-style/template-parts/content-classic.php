<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post clearfix' ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>

		<div class="blog-post-thumb">
			<?php
				$thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); 
				$thumb_url = $thumb_url[0];
				$res_img = heart_and_style_aq_resize( $thumb_url, 600, 9999 );

				$img_alt = heart_and_style_get_attachment_alt( get_post_thumbnail_id() );
			?>
			<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( $res_img ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>" /></a>
		</div><!-- .blog-post-thumb -->

	<?php endif; ?>

	<div class="blog-post-main">

		<div class="blog-post-meta">
			<?php the_time( get_option( 'date_format' ) ); ?>
		</div><!-- .blog-post-meta -->

		<div class="blog-post-title">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</div><!-- .blog-post-title -->			

		<div class="blog-post-excerpt">
			<?php the_excerpt(); ?>
		</div><!-- .blog-post-excerpt -->

		<div class="blog-post-read-more">
			<a href="<?php the_permalink(); ?>"><?php _e( 'CONTINUE READING', 'heart-and-style' ); ?></a>
		</div><!-- .blog-post-read-more -->

		<div class="clearfix">

			<div class="blog-post-share">

				<a href="<?php comments_link(); ?>"><span class="fa fa-comments"></span><span class="blog-post-share-count"><?php comments_number( __( 'No comments', 'heart-and-style' ), __( 'One comment', 'heart-and-style' ), __( '% comments', 'heart-and-style' ) ); ?></span></a>

			</div><!-- .blog-post-share -->

		</div><!-- .clearfix -->

	</div><!-- .blog-post-main -->

</article><!-- .blog-post -->
