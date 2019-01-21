<?php
/**
 * Table of Contents
 *
 * heart_and_style_posts_pagination ( Outputs post pagination )
 * heart_and_style_posts_alternate ( Output posts alternate listing )
 * heart_and_style_comment_layout ( Template for comments and pingbacks )
 */

if ( ! function_exists( 'heart_and_style_posts_pagination' ) ) : 

	/**
	 * Output post pagination
	 *
	 * @since 1.0
	 */
	function heart_and_style_posts_pagination( $atts = false ) {

		// The output will be stored here
		$output = '';

		// Current page
		if( is_front_page() ) { $paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1; } else { $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; }

		if ( ! isset( $atts['force_number'] ) ) $force_number = false; else $force_number = $atts['force_number'];
		if ( ! isset( $atts['pages'] ) ) $pages = false; else $pages = $atts['pages'];
		if ( ! isset( $atts['type'] ) ) $type = 'loadmore'; else $type = $atts['type'];
		$range = 2;

		$showitems = ($range * 2)+1;  

		if ( empty ( $paged ) ) { $paged = 1; }

		if ( $pages == '' ) {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if( ! $pages ) {
				$pages = 1;
			}
		}

		if( 1 != $pages ) {

			?>
			<div class="pagination pagination-type-<?php echo esc_attr( $type ); ?>">
				<ul class="clearfix">
					<?php

						if ( $type == 'numbered' ) {

							if($paged > 2 && $paged > $range+1 && $showitems < $pages) { echo "<li class='inactive'><a href='".get_pagenum_link(1)."'>&laquo;</a></li>"; }
							if($paged > 1 && $showitems < $pages) { echo "<li class='inactive'><a href='".get_pagenum_link($paged - 1)."' >&lsaquo;</a></li>"; }

							for ($i=1; $i <= $pages; $i++){
								if (1 != $pages &&(!($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems)){
									echo ($paged == $i)? "<li class='active'><a href='".get_pagenum_link($i)."'>".$i."</a></li>":"<li class='inactive'><a class='inactive' href='".get_pagenum_link($i)."'>".$i."</a></li>";
								}
							}

							if ($paged < $pages && $showitems < $pages) { echo "<li class='inactive'><a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>"; } 
							if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) { echo "<li class='inactive'><a href='".get_pagenum_link($pages)."'>&raquo;</a></li>"; }

						} elseif ( $type == 'prevnext' ) {

							if($paged > 1 ) { echo "<li class='inactive fl'><a href='".get_pagenum_link($paged - 1)."' >" . __( 'Newer', 'heart-and-style' ) . "</a></li>"; }
							if ($paged < $pages ) { echo "<li class='inactive fr'><a href='".get_pagenum_link($paged + 1)."'>" . __( 'Older', 'heart-and-style' ) . "</a></li>"; } 

						} elseif ( $type == 'default' ) {

							posts_nav_link();

						}

						if ( $type == 'loadmore' ) {
							if ($paged < $pages ) { 
								echo "<li class='pagination-load-more active'><a href='".get_pagenum_link($paged + 1)."'><span class='fa fa-refresh'></span>" . __( 'LOAD MORE ITEMS', 'heart-and-style' ) . "</a></li>";
							} else {
								echo "<li class='pagination-load-more inactive'><a href='#'><span class='fa fa-refresh'></span>" . __( 'LOAD MORE ITEMS', 'heart-and-style' ) . "</a></li>";
							}
						}
						
					?>
				</ul>

				<?php if ( $type == 'loadmore' ) : ?>
					<div class="load-more-temp"></div>
				<?php endif; ?>

			</div><!-- .pagination --><?php
		}

	}

endif;  // End if mdrt_posts_slider exists

if ( ! function_exists( 'heart_and_style_posts_alternate' ) ) : 

	/**
	 * Output Posts ( alternate styling )
	 *
	 * @since 1.0
	 */
	function heart_and_style_posts_alternate( $args ) {

		// The output will be stored here
		$output = '';

		// Default query arguments
		$def_query_args = array(
			'post_type' => 'post',
			'posts_per_page' => 4,
			'ignore_sticky_posts' => true,
		);

		// Merge query args
		if ( isset( $args['query_args'] ) && is_array( $args['query_args'] ) ) {
			$query_args = array_merge( $def_query_args, $args['query_args'] );
		} else {
			$query_args = $def_query_args;
		}	

		// Do the query
		$heart_and_style_query = new WP_Query( $query_args );

		// Class attribute
		$post_class = 'blog-post-alt ';
		$post_class .= 'col col-3 ';

		// Class append
		$post_class_append = '';

		// Count
		$count = 0;
		$real_count = 0;

		/**
		 * What to show
		 */

		// Defaults
		$show_heading = false;
		$show_date = false;
		$show_title = false;
		$show_comments = false;

		// Show heading?
		if ( $args['location'] == 'header_posts' ) {
			if ( heart_and_style_get_theme_mod( 'featured_post_heading_state', 'enabled' ) == 'enabled' ) { $show_heading = true; }
		} elseif( $args['location'] == 'footer_posts' ) {
			if ( heart_and_style_get_theme_mod( 'popular_post_heading_state', 'enabled' ) == 'enabled' ) { $show_heading = true; }
		}

		// Show date?
		if ( $args['location'] == 'header_posts' ) {
			if ( heart_and_style_get_theme_mod( 'featured_post_date_state', 'enabled' ) == 'enabled' ) { $show_date = true; }
		} elseif( $args['location'] == 'footer_posts' ) {
			if ( heart_and_style_get_theme_mod( 'popular_post_date_state', 'enabled' ) == 'enabled' ) { $show_date = true; }
		}

		// Show title?
		if ( $args['location'] == 'header_posts' ) {
			if ( heart_and_style_get_theme_mod( 'featured_post_title_state', 'enabled' ) == 'enabled' ) { $show_title = true; }
		} elseif( $args['location'] == 'footer_posts' ) {
			if ( heart_and_style_get_theme_mod( 'popular_post_title_state', 'enabled' ) == 'enabled' ) { $show_title = true; }
		}

		// Show comments?
		if ( $args['location'] == 'header_posts' ) {
			if ( heart_and_style_get_theme_mod( 'featured_post_comments_state', 'enabled' ) == 'enabled' ) { $show_comments = true; }
		} elseif( $args['location'] == 'footer_posts' ) {
			if ( heart_and_style_get_theme_mod( 'popular_post_comments_state', 'enabled' ) == 'enabled' ) { $show_comments = true; }
		}
		

		?>

		<?php if ( $heart_and_style_query->have_posts() ) : ?>

			<?php if ( isset( $args['heading_title'] ) && $show_heading ) : ?>
				<div class="section-heading">
					<h2><?php echo esc_html( $args['heading_title'] ); ?></h2>
					<?php if ( isset( $args['heading_link_url'] ) ) : ?>
						<a href="<?php echo esc_attr( $args['heading_link_url'] ); ?>"><?php echo esc_html( $args['heading_link_title'] ); ?></a>
					<?php endif; ?>
				</div><!-- .section-heading -->
			<?php endif; ?>

			<div class="blog-posts-alt clearfix">

				<?php while ( $heart_and_style_query->have_posts() ) : $heart_and_style_query->the_post(); $count++; $real_count++; ?>

					<?php

						// Last col in row?
						$post_class_append = '';
						if ( $count == 4 ) {
							$post_class_append = 'col-last ';
							$count = 0;
						}

					?>
				
					<div <?php post_class( $post_class . $post_class_append ); ?>>

						<?php if ( has_post_thumbnail() ) : ?>
							<div class="blog-post-alt-thumb">
									
								<?php
									$thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); 
									$thumb_url = $thumb_url[0];
									$res_img = heart_and_style_aq_resize( $thumb_url, 600, 400, true );
									$img_alt = heart_and_style_get_attachment_alt( get_post_thumbnail_id() );
								?>

								<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( $res_img ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>" /></a>

							</div><!-- .blog-post-alt-thumb -->
						<?php endif; ?>

						<?php if ( $show_date ) : ?>

							<div class="blog-post-alt-meta">
								<?php the_time( get_option( 'date_format' ) ); ?>
							</div><!-- .blog-post-alt-meta -->

						<?php endif; ?>

						<?php if ( $show_title ) : ?>

							<div class="blog-post-alt-title">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							</div><!-- .blog-post-alt-title -->

						<?php endif; ?>

						<?php if ( $show_comments ) : ?>

							<div class="blog-post-alt-comments-count">
								<a href="<?php comments_link(); ?>"><span class="fa fa-comments"></span><?php comments_number( __( 'No comments', 'heart-and-style' ), __( 'One comment', 'heart-and-style' ), __( '% comments', 'heart-and-style' ) ); ?></a>
							</div><!-- .blog-post-alt-comments-count -->

						<?php endif; ?>

					</div><!-- .blog-post-alt -->

				<?php endwhile; ?>

			</div><!-- .blog-posts-listing-alt -->

		<?php else :  ?>

			<?php // Nadda ?>

		<?php endif; ?>

		<?php

		wp_reset_postdata();

	}

endif; // End if heart_and_style_posts_alternate exists

if ( ! function_exists( 'heart_and_style_comment_layout' ) ) :

	/**
	 * Template for comments and pingbacks.
	 *
	 * @since 1.0
	 */
	function heart_and_style_comment_layout( $comment, $args, $depth ) {

		$GLOBALS['comment'] = $comment;
		
		switch ( $comment->comment_type ) :
			
			case 'pingback' :
			case 'trackback' :
				?>
				<li class="comments-pingback">
					<p><?php _e( 'Pingback:', 'heart-and-style' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'heart-and-style' ), ' ' ); ?></p>
				<?php
			break;
			default :

				if ( $comment->comment_approved == '1' ) :

					?>

					<li <?php comment_class( 'comment' ); ?> id="comment-<?php comment_ID(); ?>">

						<div class="comment-inner">

							<span class="comment-author-avatar"><?php echo get_avatar( $comment, 60 ); ?></span>

							<div class="comment-info clearfix">

								<ul class="comment-meta clearfix">
									<li class="comment-meta-author"><?php echo get_comment_author_link(); ?></li>
									<li class="comment-meta-date"><?php echo get_comment_date(); ?></li>
								</ul>

								<span class="comment-reply">
									<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
								</span>

							</div><!-- .comment-info -->

							<div class="comment-main clearfix">
								
								<?php if ( $comment->comment_approved == '0' ) : ?>
									<p><em><?php _e( 'Your comment is awaiting moderation.', 'heart-and-style' ); ?></em></p>
								<?php endif; ?>
								<?php comment_text(); ?>

							</div><!-- .comment-main -->

						</div><!-- .comment-inner -->

					<?php

				endif;

				break;
		endswitch;

	}

endif; // End if heart_and_style_comment_layout