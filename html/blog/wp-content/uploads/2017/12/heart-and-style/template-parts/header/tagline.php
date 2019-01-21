<?php
	/* Outputs the featured posts section on homepage just below the slider area. */
?>

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

?>

<?php if ( ! $is_home ) : ?>

	<?php

		/**
		 * BG Image
		 */

		$bg_image_src = false;

		// Get category specific image
		if ( is_category() ) {

			$image = false;

			if ( get_option( 'mrd_category_meta' ) ) {
				
				$category_meta = get_option( 'mrd_category_meta' );
				$cat_ID = get_query_var('cat');

				if ( isset( $category_meta[$cat_ID] ) ) {
					$image = $category_meta[$cat_ID]['mrd_category_img'];
				}

			}

		}

		// Get tag specific image
		if ( is_tag() ) {

			$image = false;

			if ( get_option( 'mrd_tags_meta' ) ) {
				
				$tags_meta = get_option( 'mrd_tags_meta' );
				$tag_ID = get_query_var('tag_id');

				if ( isset( $tags_meta[$tag_ID] ) ) {
					$image = $tags_meta[$tag_ID]['mrd_tag_img'];
				}

			}
		}

		// If singular and banner image supplied
		if ( is_singular() && heart_and_style_get_post_meta( get_the_ID(), 'banner_image' ) ) {

			$bg_image_src = heart_and_style_get_post_meta( get_the_ID(), 'banner_image' );

		// If singular and has featured image
		} elseif ( is_singular() && has_post_thumbnail( get_the_ID() ) ) {
			
			$bg_image_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
			$bg_image_src = $bg_image_src[0];

		// Category archives and has specific image set
		} elseif ( is_category() && $image ) {

			$bg_image_src = $image;

		// Tag archives and has specific image set
		} elseif ( is_tag() && $image ) {

			$bg_image_src = $image;

		// Archives and has default image set
		} elseif ( is_archive() && heart_and_style_get_theme_mod( 'tagline_bg_img_archives', false ) ) {

			$bg_image_src = heart_and_style_get_theme_mod( 'tagline_bg_img_archives', false );
			
		// Search results
		} elseif ( is_search() && heart_and_style_get_theme_mod( 'tagline_bg_img_search', false ) ) {

			$bg_image_src = heart_and_style_get_theme_mod( 'tagline_bg_img_search', false );

		// 404 page
		} elseif ( is_404() && heart_and_style_get_theme_mod( 'tagline_bg_img_404', false ) ) {

			$bg_image_src = heart_and_style_get_theme_mod( 'tagline_bg_img_404', false );

		// At the end check if there's a default one set
		} elseif ( heart_and_style_get_theme_mod( 'tagline_bg_img_default', false ) ) {

			$bg_image_src = heart_and_style_get_theme_mod( 'tagline_bg_img_default', false );

		}

		$bg_image = '';
		if ( $bg_image_src ) {
			$bg_image = 'background-image: url(' . $bg_image_src . ');';			
		}

		/**
		 * Tagline Title
		 */

		if ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$title = single_tag_title( '', false );
		} elseif ( is_author() ) {
			$title = get_the_author();
		} elseif ( is_year() ) {
			$title = get_the_date( 'Y' );
		} elseif ( is_month() ) {
			$title = get_the_date( 'F Y' );
		} elseif ( is_day() ) {
			$title = get_the_date( 'F j, Y' );
		} elseif ( is_post_type_archive() ) {
			$title = post_type_archive_title( '', false );
		} elseif ( is_tax() ) {
			$tax = get_taxonomy( get_queried_object()->taxonomy );
			$title = $tax->labels->singular_name . ' ' . single_term_title( '', false );
		} elseif ( is_search() ) {
			$title = get_search_query();
		} elseif ( is_404() ) {
			$title = __( 'Not Found', 'heart-and-style' );
		} else {
			$title = get_the_title( get_the_ID() );
		}

	?>

	<div id="tagline" class="init-parallax" style="<?php echo esc_attr( $bg_image ); ?>" data-stellar-background-ratio="0.5">

		<div id="tagline-overlay"></div>

		<div class="wrapper">

			<?php if ( is_singular( 'post' ) && has_category() ) : ?>
				<div id="tagline-meta"><?php the_category( ' ' ); ?></div>
			<?php elseif ( is_category() ) : ?>
				<div id="tagline-meta"><span><?php _e( 'Browsing Category', 'heart-and-style' ); ?></span></div>
			 <?php elseif ( is_author() ) : ?>
				<div id="tagline-meta"><span><?php _e( 'Browsing Author', 'heart-and-style' ); ?></span></div>
			<?php elseif ( is_tag() ) : ?>
				<div id="tagline-meta"><span><?php _e( 'Browsing Tag', 'heart-and-style' ); ?></span></div>
			<?php elseif ( is_search() ) : ?>
				<div id="tagline-meta"><span><?php _e( 'Search Results', 'heart-and-style' ); ?></span></div>
			<?php elseif ( is_404() ) : ?>
				<div id="tagline-meta"><span><?php _e( 'Error 404', 'heart-and-style' ); ?></span></div>
			<?php endif; ?>

			<h1><?php echo esc_html( $title ); ?></h1>

			<?php if ( is_singular() && heart_and_style_get_post_meta( get_the_ID(), 'banner_tagline' ) ) : ?>
				<h4><?php echo heart_and_style_get_post_meta( get_the_ID(), 'banner_tagline' ); ?></h4>
			<?php elseif ( is_singular() && has_excerpt() ) : ?>
				<h4><?php the_excerpt(); ?></h4>
			<?php endif; ?>

		</div><!-- .wrapper -->

	</div><!-- #tagline -->

<?php endif; ?>