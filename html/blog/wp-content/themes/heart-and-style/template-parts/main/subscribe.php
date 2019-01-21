<?php

	$is_home = false;

	// If the regular homepage
	if ( is_home() ) {
		$is_home = true;
	}

	// If template that's homepage
	if ( strpos( get_page_template_slug( get_the_ID() ), 'template-home' ) !== false ) {
		$is_home = true;
	}

	// Is enabled
	$is_enabled = false;
	if ( heart_and_style_get_theme_mod( 'subscribe_state', 'enabled' ) == 'enabled' ) {
		$is_enabled = true;
	}

	// The shortcode
	$shortcode = heart_and_style_get_theme_mod( 'subscribe_shortcode', '[wysija_form id="1"]' );

	// Is wysija?
	$is_wysija = false;
	if (strpos($shortcode, 'wysija') !== false) { 
		$is_wysija = true;
	}
?>

<?php if ( $is_home && $is_enabled ) : ?>

	<?php if ( ( $is_wysija && shortcode_exists( 'wysija_form' ) ) || ! $is_wysija ) : ?>

		<div class="wrapper">

			<div class="subscribe-section">

				<div class="subscribe-section-inner clearfix">

					<div class="subscribe-section-info">
						<h4><?php echo heart_and_style_get_theme_mod( 'subscribe_title_text', 'Don\'t Miss Out, Subscribe to the Newsletter!' ); ?></h4>
						<h5><?php echo heart_and_style_get_theme_mod( 'subscribe_subtitle_text', 'Best Feminine WordPress themes, Video Tutorials and Freebies.' ); ?></h5>
					</div><!-- .subscribe-section-info -->

					<div class="subscribe-section-form">
						<?php echo do_shortcode( $shortcode ); ?>
					</div><!-- .subscribe-section-form -->

				</div><!-- .subscribe-section-inner -->

			</div><!-- .subscribe-section -->

		</div><!-- .wrapper -->

	<?php endif; ?>

<?php endif; ?>