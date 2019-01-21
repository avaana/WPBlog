<?php

// Logo Position
$logo_position = heart_and_style_get_theme_mod( 'logo_position', 'inline_center' );

// Social class
$social_class = 'col col-4 col-last ';
if ( $logo_position == 'below_center' ) {
	$social_class = 'float-right';
}

$has_icons = false;

?>

<div id="header-social" class="<?php echo esc_attr( $social_class ); ?>">
	<?php if ( heart_and_style_get_theme_mod( 'social_twitter', false ) ) : $has_icons = true; ?>
		<a href="<?php echo esc_attr( heart_and_style_get_theme_mod( 'social_twitter', false ) ); ?>" target="_blank"><span class="fa fa-twitter"></span></a>
	<?php endif; ?>
	<?php if ( heart_and_style_get_theme_mod( 'social_facebook', false ) ) : $has_icons = true; ?>
		<a href="<?php echo esc_attr( heart_and_style_get_theme_mod( 'social_facebook', false ) ); ?>" target="_blank"><span class="fa fa-facebook"></span></a>
	<?php endif; ?>
	<?php if ( heart_and_style_get_theme_mod( 'social_youtube', false ) ) : $has_icons = true; ?>
		<a href="<?php echo esc_attr( heart_and_style_get_theme_mod( 'social_youtube', false ) ); ?>" target="_blank"><span class="fa fa-youtube-play"></span></a>
	<?php endif; ?>
	<?php if ( heart_and_style_get_theme_mod( 'social_vimeo', false ) ) : $has_icons = true; ?>
		<a href="<?php echo esc_attr( heart_and_style_get_theme_mod( 'social_vimeo', false ) ); ?>" target="_blank"><span class="fa fa-vimeo"></span></a>
	<?php endif; ?>
	<?php if ( heart_and_style_get_theme_mod( 'social_tumblr', false ) ) : $has_icons = true; ?>
		<a href="<?php echo esc_attr( heart_and_style_get_theme_mod( 'social_tumblr', false ) ); ?>" target="_blank"><span class="fa fa-tumblr"></span></a>					
	<?php endif; ?>
	<?php if ( heart_and_style_get_theme_mod( 'social_pinterest', false ) ) : $has_icons = true; ?>
		<a href="<?php echo esc_attr( heart_and_style_get_theme_mod( 'social_pinterest', false ) ); ?>" target="_blank"><span class="fa fa-pinterest"></span></a>
	<?php endif; ?>
	<?php if ( heart_and_style_get_theme_mod( 'social_linkedin', false ) ) : $has_icons = true; ?>
		<a href="<?php echo esc_attr( heart_and_style_get_theme_mod( 'social_linkedin', false ) ); ?>" target="_blank"><span class="fa fa-linkedin"></span></a>
	<?php endif; ?>
	<?php if ( heart_and_style_get_theme_mod( 'social_instagram', false ) ) : $has_icons = true; ?>
		<a href="<?php echo esc_attr( heart_and_style_get_theme_mod( 'social_instagram', false ) ); ?>" target="_blank"><span class="fa fa-instagram"></span></a>
	<?php endif; ?>
	<?php if ( heart_and_style_get_theme_mod( 'social_github', false ) ) : $has_icons = true; ?>
		<a href="<?php echo esc_attr( heart_and_style_get_theme_mod( 'social_github', false ) ); ?>" target="_blank"><span class="fa fa-github"></span></a>
	<?php endif; ?>
	<?php if ( heart_and_style_get_theme_mod( 'social_googleplus', false ) ) : $has_icons = true; ?>
		<a href="<?php echo esc_attr( heart_and_style_get_theme_mod( 'social_googleplus', false ) ); ?>" target="_blank"><span class="fa fa-googleplus"></span></a>
	<?php endif; ?>
	<?php if ( heart_and_style_get_theme_mod( 'social_dribbble', false ) ) : $has_icons = true; ?>
		<a href="<?php echo esc_attr( heart_and_style_get_theme_mod( 'social_dribbble', false ) ); ?>" target="_blank"><span class="fa fa-dribbble"></span></a>
	<?php endif; ?>
	<?php if ( heart_and_style_get_theme_mod( 'social_dropbox', false ) ) : $has_icons = true; ?>
		<a href="<?php echo esc_attr( heart_and_style_get_theme_mod( 'social_dropbox', false ) ); ?>" target="_blank"><span class="fa fa-dropbox"></span></a>
	<?php endif; ?>
	<?php if ( heart_and_style_get_theme_mod( 'social_flickr', false ) ) : $has_icons = true; ?>
		<a href="<?php echo esc_attr( heart_and_style_get_theme_mod( 'social_flickr', false ) ); ?>" target="_blank"><span class="fa fa-flickr"></span></a>
	<?php endif; ?>
	<?php if ( heart_and_style_get_theme_mod( 'social_foursquare', false ) ) : $has_icons = true; ?>
		<a href="<?php echo esc_attr( heart_and_style_get_theme_mod( 'social_foursquare', false ) ); ?>" target="_blank"><span class="fa fa-foursquare"></span></a>
	<?php endif; ?>
	<?php if ( heart_and_style_get_theme_mod( 'social_behance', false ) ) : $has_icons = true; ?>
		<a href="<?php echo esc_attr( heart_and_style_get_theme_mod( 'social_behance', false ) ); ?>" target="_blank"><span class="fa fa-behance"></span></a>
	<?php endif; ?>
	<?php if ( heart_and_style_get_theme_mod( 'social_rss', false ) ) : $has_icons = true; ?>
		<a href="<?php echo esc_attr( heart_and_style_get_theme_mod( 'social_rss', false ) ); ?>" target="_blank"><span class="fa fa-rss"></span></a>
	<?php endif; ?>

	<?php if ( $has_icons ) : ?>
		<span class="header-social-sep"></span>
	<?php endif; ?>
	<a href="#" class="header-search-hook-show"><span class="fa fa-search"></span></a>

	<?php
		$mobile_nav_output = '';
		if( has_nav_menu('primary') ) {
			
			$locations = get_nav_menu_locations();
			$menu = wp_get_nav_menu_object($locations['primary']);
			$menu_items = wp_get_nav_menu_items($menu->term_id);
			$mobile_nav_output = '';
			
			$mobile_nav_output .= '<select>';
					
				$mobile_nav_output .= '<option>' . esc_html__( '- Select Page -', 'heart-and-style' ) . '</option>';

				foreach ( $menu_items as $key => $menu_item ) {
					$title = $menu_item->title;
					$url = $menu_item->url;
					$nav_selected = '';
					if($menu_item->object_id == get_the_ID()){ $nav_selected = 'selected="selected"'; }
					if($menu_item->post_parent !== 0){
						$mobile_nav_output .= '<option value="'.$url.'" '.$nav_selected.'> - '.$title.'</option>';
					}else{
						$mobile_nav_output .= '<option value="'.$url.'" '.$nav_selected.'>'.$title.'</option>';
					}
				}

			$mobile_nav_output .= '</select>';

		}
	?>

	<span class="header-search-mobile-nav-hook"><span class="fa fa-reorder"></span><?php echo $mobile_nav_output; ?></span>

	<div class="header-search">
		<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<input type="text" name="s" value="" />
			<span class="header-search-placeholder"><?php esc_html_e( 'SEARCH AND HIT ENTER', 'heart-and-style' ); ?></span>
		</form>
		<span class="header-search-hook-hide"><span class="fa fa-remove"></span></span>
	</div><!-- .sas-search -->

</div><!-- #header-social -->