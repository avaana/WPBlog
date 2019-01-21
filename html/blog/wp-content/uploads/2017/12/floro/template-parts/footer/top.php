<?php
/**
 * The template part for displaying the top section of the footer
 *
 * @package Floro
 * @since Floro 1.0
 */
?>
<div id="footer-top">
	
	<div class="wrapper clearfix">
		
		<div id="footer-social">

			<div class="social-links-w-labels">
				
				<?php if ( floro_get_option( 'social_twitter', false ) ) : ?>
					<a href="<?php echo esc_url( floro_get_option( 'social_twitter', false ) ); ?>" target="_blank"><span class="fa fa-twitter"></span><span class="social-links-label"><?php esc_html_e( 'Twitter', 'floro'); ?></span></a>
				<?php endif; ?>
				<?php if ( floro_get_option( 'social_facebook', false ) ) : ?>
					<a href="<?php echo esc_url( floro_get_option( 'social_facebook', false ) ); ?>" target="_blank"><span class="fa fa-facebook"></span><span class="social-links-label"><?php esc_html_e( 'Facebook', 'floro'); ?></span></a>
				<?php endif; ?>
				<?php if ( floro_get_option( 'social_youtube', false ) ) : ?>
					<a href="<?php echo esc_url( floro_get_option( 'social_youtube', false ) ); ?>" target="_blank"><span class="fa fa-youtube-play"></span><span class="social-links-label"><?php esc_html_e( 'Youtube', 'floro'); ?></span></a>
				<?php endif; ?>
				<?php if ( floro_get_option( 'social_vimeo', false ) ) : ?>
					<a href="<?php echo esc_url( floro_get_option( 'social_vimeo', false ) ); ?>" target="_blank"><span class="fa fa-vimeo"></span><span class="social-links-label"><?php esc_html_e( 'Vimeo', 'floro'); ?></span></a>
				<?php endif; ?>
				<?php if ( floro_get_option( 'social_tumblr', false ) ) : ?>
					<a href="<?php echo esc_url( floro_get_option( 'social_tumblr', false ) ); ?>" target="_blank"><span class="fa fa-tumblr"></span><span class="social-links-label"><?php esc_html_e( 'Tumblr', 'floro'); ?></span></a>					
				<?php endif; ?>
				<?php if ( floro_get_option( 'social_pinterest', false ) ) : ?>
					<a href="<?php echo esc_url( floro_get_option( 'social_pinterest', false ) ); ?>" target="_blank"><span class="fa fa-pinterest"></span><span class="social-links-label"><?php esc_html_e( 'Pinterest', 'floro'); ?></span></a>
				<?php endif; ?>
				<?php if ( floro_get_option( 'social_linkedin', false ) ) : ?>
					<a href="<?php echo esc_url( floro_get_option( 'social_linkedin', false ) ); ?>" target="_blank"><span class="fa fa-linkedin"></span><span class="social-links-label"><?php esc_html_e( 'LinkedIn', 'floro'); ?></span></a>
				<?php endif; ?>
				<?php if ( floro_get_option( 'social_instagram', false ) ) : ?>
					<a href="<?php echo esc_url( floro_get_option( 'social_instagram', false ) ); ?>" target="_blank"><span class="fa fa-instagram"></span><span class="social-links-label"><?php esc_html_e( 'Instagram', 'floro'); ?></span></a>
				<?php endif; ?>
				<?php if ( floro_get_option( 'social_github', false ) ) : ?>
					<a href="<?php echo esc_url( floro_get_option( 'social_github', false ) ); ?>" target="_blank"><span class="fa fa-github"></span><span class="social-links-label"><?php esc_html_e( 'GitHub', 'floro'); ?></span></a>
				<?php endif; ?>
				<?php if ( floro_get_option( 'social_googleplus', false ) ) : ?>
					<a href="<?php echo esc_url( floro_get_option( 'social_googleplus', false ) ); ?>" target="_blank"><span class="fa fa-googleplus"></span><span class="social-links-label"><?php esc_html_e( 'Google+', 'floro'); ?></span></a>
				<?php endif; ?>
				<?php if ( floro_get_option( 'social_dribbble', false ) ) : ?>
					<a href="<?php echo esc_url( floro_get_option( 'social_dribbble', false ) ); ?>" target="_blank"><span class="fa fa-dribbble"></span><span class="social-links-label"><?php esc_html_e( 'Dribbble', 'floro'); ?></span></a>
				<?php endif; ?>
				<?php if ( floro_get_option( 'social_dropbox', false ) ) : ?>
					<a href="<?php echo esc_url( floro_get_option( 'social_dropbox', false ) ); ?>" target="_blank"><span class="fa fa-dropbox"></span><span class="social-links-label"><?php esc_html_e( 'Dropbox', 'floro'); ?></span></a>
				<?php endif; ?>
				<?php if ( floro_get_option( 'social_flickr', false ) ) : ?>
					<a href="<?php echo esc_url( floro_get_option( 'social_flickr', false ) ); ?>" target="_blank"><span class="fa fa-flickr"></span><span class="social-links-label"><?php esc_html_e( 'Flickr', 'floro'); ?></span></a>
				<?php endif; ?>
				<?php if ( floro_get_option( 'social_foursquare', false ) ) : ?>
					<a href="<?php echo esc_url( floro_get_option( 'social_foursquare', false ) ); ?>" target="_blank"><span class="fa fa-foursquare"></span><span class="social-links-label"><?php esc_html_e( 'Foursquare', 'floro'); ?></span></a>
				<?php endif; ?>
				<?php if ( floro_get_option( 'social_behance', false ) ) : ?>
					<a href="<?php echo esc_url( floro_get_option( 'social_behance', false ) ); ?>" target="_blank"><span class="fa fa-behance"></span><span class="social-links-label"><?php esc_html_e( 'Behance', 'floro'); ?></span></a>
				<?php endif; ?>
				<?php if ( floro_get_option( 'social_rss', false ) ) : ?>
					<a href="<?php echo esc_url( floro_get_option( 'social_rss', false ) ); ?>" target="_blank"><span class="fa fa-rss"></span><span class="social-links-label"><?php esc_html_e( 'RSS', 'floro'); ?></span></a>
				<?php endif; ?>

			</div><!-- .social-links-w-labels -->

		</div><!-- #footer-social -->

		<div id="footer-scroll-to-top">
			<span class="scroll-to-top"><?php esc_html_e( 'TO TOP', 'floro' ); ?><span class="fa fa-chevron-up"></span></span>
		</div><!-- #footer-scroll-to-top -->

	</div><!-- .wrapper -->

</div><!-- #footer-top -->