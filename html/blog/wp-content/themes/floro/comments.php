<?php
/**
 * The template for displaying comments
 *
 * @package Floro
 * @since Floro 1.0
 */

// Password protected + password not supplied
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

		<h2 class="comments-title">
			<?php
				$comments_number = get_comments_number();
				if ( 1 === $comments_number ) {
					/* translators: %s: post title */
					printf( _x( 'One comment on &ldquo;%s&rdquo;', 'comments title', 'floro' ), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s comments on &ldquo;%2$s&rdquo;',
							'%1$s comments on &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title',
							'floro'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
			?>
		</h2>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'callback'   => 'floro_comment_layout'
				) );
			?>
		</ol><!-- .comment-list -->

		<?php the_comments_navigation(); ?>

	<?php endif; // Check for have_comments(). ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<div class="comments-closed"><?php esc_html_e( 'Comments are closed.', 'floro' ); ?></div>
	<?php endif; ?>

	<?php 
		comment_form(array(
			'comment_field' => '<div class="comment-form-comment"><textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Comment', 'floro' ) . '" aria-required="true"></textarea></div>',
			'fields' => apply_filters( 'comment_form_default_fields', array(
				'author' => '<div class="comment-form-name col col-4"><input id="author" name="author" type=text value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" placeholder="' . esc_attr__( 'Name', 'floro' ) . ' *" aria-required="true" /></div>',
				'email' => '<div class="comment-form-email col col-4"><input id="email" name="email" type=text value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" placeholder="' . esc_attr__( 'Email', 'floro' ) . ' *" aria-required="true" /></div>',
				'url' => '<div class="comment-form-website col col-4 col-last"><input id="url" name="url" type=text value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="' . esc_attr__( 'Website', 'floro' ) . '" /></div>' 
			)),
		)); 
	?>

</div><!-- #comments -->
