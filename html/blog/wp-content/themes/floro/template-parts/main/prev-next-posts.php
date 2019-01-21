<div class="blog-post-single-nav">
	<?php
		// prev/next post
		the_post_navigation( array(
			'prev_text' => '<span class="blog-post-single-nav-button blog-post-single-nav-prev"><span class="fa fa-angle-left"></span>' . esc_html__( 'Previous post', 'floro' ) . '</span>%title',
			'next_text' => '<span class="blog-post-single-nav-button blog-post-single-nav-next">' . esc_html__( 'Next post', 'floro' ) . '<span class="fa fa-angle-right"></span></span>%title'
		) );
	?>
</div><!-- .blog-post-single-nav -->	