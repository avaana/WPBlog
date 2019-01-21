<?php
/**
 * Display related functions
 *
 * @package Floro
 * @since Floro 1.0
 */

if ( ! function_exists( 'floro_comment_layout' ) ) {

	/**
	 * Template for comments and pingbacks.
	 *
	 * @since 1.0
	 */
	function floro_comment_layout( $comment, $args, $depth ) {
		
		// Switch through comment types
		switch ( $comment->comment_type ) :
			
			case 'pingback' :
			case 'trackback' :
				?>
				<li class="comments-pingback">
					<p><?php esc_html_e( 'Pingback:', 'floro' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( '(Edit)', 'floro' ), ' ' ); ?></p>
				<?php
			break;
			default :

				// Is the comments approved?
				if ( $comment->comment_approved == '1' ) :

					?>

					<li <?php comment_class( 'comment' ); ?> id="comment-<?php comment_ID(); ?>">

						<div class="comment-inner">

							<span class="comment-author-avatar"><?php echo get_avatar( $comment, 60 ); ?></span>

							<div class="comment-info clearfix">

								<ul class="comment-meta clearfix">
									<li class="comment-meta-author"><?php echo get_comment_author_link(); ?></li>
									<li class="comment-meta-date"><?php echo get_comment_date(); ?></li>
								</ul><!-- .comment-meta -->

								<span class="comment-reply">
									<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
								</span><!-- .comment-reply -->

							</div><!-- .comment-info -->

							<div class="comment-main clearfix">
								
								<?php if ( $comment->comment_approved == '0' ) : ?>
									<p><em><?php esc_html_e( 'Your comment is awaiting moderation.', 'floro' ); ?></em></p>
								<?php endif; ?>

								<?php comment_text(); ?>

							</div><!-- .comment-main -->

						</div><!-- .comment-inner -->

					<?php

				endif;

				break;

		endswitch;

	}

}

if ( ! function_exists( 'floro_the_custom_logo' ) ) {

	/**
	 * Displays custom logo
	 *
	 * @since 1.0
	 */
	function floro_the_custom_logo() {
		if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		}
	}

}