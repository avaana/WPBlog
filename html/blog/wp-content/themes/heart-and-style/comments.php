<?php
	/* Password protected and not supplied */
	if ( post_password_required() ) { return; }
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			
			<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
				<div class="nav-links">
					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'heart-and-style' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'heart-and-style' ) ); ?></div>
				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-above -->

		<?php endif; ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'callback'   => 'heart_and_style_comment_layout'
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			
			<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
				<div class="nav-links">
					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'heart-and-style' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'heart-and-style' ) ); ?></div>
				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-below -->

		<?php endif; // Check for comment navigation. ?>

	<?php endif; // Check for have_comments(). ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<div class="comments-closed"><?php esc_html_e( 'Comments are closed.', 'heart-and-style' ); ?></div>
	<?php endif; ?>

	<?php 

		comment_form(array(
			'comment_field' => '<div class="comment-form-comment"><textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Comment', 'heart-and-style' ) . '" aria-required="true"></textarea></div>',
			'fields' => apply_filters( 'comment_form_default_fields', array(
				'author' => '<div class="comment-form-name col col-4"><input id="author" name="author" type=text value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" placeholder="' . esc_attr__( 'Name', 'heart-and-style' ) . ' *" aria-required="true" /></div>',
				'email' => '<div class="comment-form-email col col-4"><input id="email" name="email" type=text value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" placeholder="' . esc_attr__( 'Email', 'heart-and-style' ) . ' *" aria-required="true" /></div>',
				'url' => '<div class="comment-form-website col col-4 col-last"><input id="url" name="url" type=text value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="' . esc_attr__( 'Website', 'heart-and-style' ) . '" /></div>' 
			)),
		)); 
	?>

</div><!-- #comments -->
