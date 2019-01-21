<?php

/**
 * Table Of Contents
 *
 * Heart_And_Style_Aq_Resize ( Image resizing class )
 * heart_and_style_aq_resize ( Image resizing function )
 * header_and_style_post_older_than
 * heart_and_style_get_social_count ( Returns amount of social shares a page has )
 * heart_and_style_get_theme_mod ( Returns customizer option value )
 * heart_and_style_get_post_meta ( Returns post meta value )
 * heart_and_style_get_attachment_alt ( Returns the alt attribute for an attachment )
 * heart_and_style_body_class ( Additional classes for body )
 */

if( ! class_exists('Heart_And_Style_Aq_Resize') ) {

	/**
	 * Image resizing class
	 *
	 * @since 1.0
	 */
	class Heart_And_Style_Aq_Resize {

		/**
		 * The singleton instance
		 */
		static private $instance = null;

		/**
		 * No initialization allowed
		 */
		private function __construct() {}

		/**
		 * No cloning allowed
		 */
		private function __clone() {}

		/**
		 * For your custom default usage you may want to initialize an Aq_Resize object by yourself and then have own defaults
		 */
		static public function getInstance() {
			if(self::$instance == null) {
				self::$instance = new self;
			}

			return self::$instance;
		}

		/**
		 * Run, forest.
		 */
		public function process( $url, $width = null, $height = null, $crop = null, $single = true, $upscale = true ) {

			// Validate inputs.
			if ( ! $url || ( ! $width && ! $height ) ) return false;

			$upscale = true;

			// Caipt'n, ready to hook.
			if ( true === $upscale ) add_filter( 'image_resize_dimensions', array($this, 'aq_upscale'), 10, 6 );

			// Define upload path & dir.
			$upload_info = wp_upload_dir();
			$upload_dir = $upload_info['basedir'];
			$upload_url = $upload_info['baseurl'];
			
			$http_prefix = "http://";
			$https_prefix = "https://";
			
			/* if the $url scheme differs from $upload_url scheme, make them match 
			   if the schemes differe, images don't show up. */
			if(!strncmp($url,$https_prefix,strlen($https_prefix))){ //if url begins with https:// make $upload_url begin with https:// as well
				$upload_url = str_replace($http_prefix,$https_prefix,$upload_url);
			}
			elseif(!strncmp($url,$http_prefix,strlen($http_prefix))){ //if url begins with http:// make $upload_url begin with http:// as well
				$upload_url = str_replace($https_prefix,$http_prefix,$upload_url);      
			}
			

			// Check if $img_url is local.
			if ( false === strpos( $url, $upload_url ) ) return false;

			// Define path of image.
			$rel_path = str_replace( $upload_url, '', $url );
			$img_path = $upload_dir . $rel_path;

			// Check if img path exists, and is an image indeed.
			if ( ! file_exists( $img_path ) or ! getimagesize( $img_path ) ) return false;

			// Get image info.
			$info = pathinfo( $img_path );
			$ext = $info['extension'];
			list( $orig_w, $orig_h ) = getimagesize( $img_path );

			// Get image size after cropping.
			$dims = image_resize_dimensions( $orig_w, $orig_h, $width, $height, $crop );
			$dst_w = $dims[4];
			$dst_h = $dims[5];

			// Return the original image only if it exactly fits the needed measures.
			if ( ! $dims && ( ( ( null === $height && $orig_w == $width ) xor ( null === $width && $orig_h == $height ) ) xor ( $height == $orig_h && $width == $orig_w ) ) ) {
				$img_url = $url;
				$dst_w = $orig_w;
				$dst_h = $orig_h;
			} else {
				// Use this to check if cropped image already exists, so we can return that instead.
				$suffix = "{$dst_w}x{$dst_h}";
				$dst_rel_path = str_replace( '.' . $ext, '', $rel_path );
				$destfilename = "{$upload_dir}{$dst_rel_path}-{$suffix}.{$ext}";

				if ( ! $dims || ( true == $crop && false == $upscale && ( $dst_w < $width || $dst_h < $height ) ) ) {
					// Can't resize, so return false saying that the action to do could not be processed as planned.
					return $url;
				}
				// Else check if cache exists.
				elseif ( file_exists( $destfilename ) && getimagesize( $destfilename ) ) {
					$img_url = "{$upload_url}{$dst_rel_path}-{$suffix}.{$ext}";
				}
				// Else, we resize the image and return the new resized image url.
				else {

					$editor = wp_get_image_editor( $img_path );

					if ( is_wp_error( $editor ) || is_wp_error( $editor->resize( $width, $height, $crop ) ) )
						return $url;

					$resized_file = $editor->save();

					if ( ! is_wp_error( $resized_file ) ) {
						$resized_rel_path = str_replace( $upload_dir, '', $resized_file['path'] );
						$img_url = $upload_url . $resized_rel_path;
					} else {
						return $url;
					}

				}
			}

			// Okay, leave the ship.
			if ( true === $upscale ) remove_filter( 'image_resize_dimensions', array( $this, 'aq_upscale' ) );

			// Return the output.
			if ( $single ) {
				// str return.
				$image = $img_url;
			} else {
				// array return.
				$image = array (
					0 => $img_url,
					1 => $dst_w,
					2 => $dst_h
				);
			}

			return $image;
		}

		/**
		 * Callback to overwrite WP computing of thumbnail measures
		 */
		function aq_upscale( $default, $orig_w, $orig_h, $dest_w, $dest_h, $crop ) {
			if ( ! $crop ) return null; // Let the wordpress default function handle this.

			// Here is the point we allow to use larger image size than the original one.
			$aspect_ratio = $orig_w / $orig_h;
			$new_w = $dest_w;
			$new_h = $dest_h;

			if ( ! $new_w ) {
				$new_w = intval( $new_h * $aspect_ratio );
			}

			if ( ! $new_h ) {
				$new_h = intval( $new_w / $aspect_ratio );
			}

			$size_ratio = max( $new_w / $orig_w, $new_h / $orig_h );

			$crop_w = round( $new_w / $size_ratio );
			$crop_h = round( $new_h / $size_ratio );

			$s_x = floor( ( $orig_w - $crop_w ) / 2 );
			$s_y = floor( ( $orig_h - $crop_h ) / 2 );

			return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
		}

	}
	
}


if ( ! function_exists('heart_and_style_aq_resize') ) {

	/**
	 * Resize an image using Heart_And_Style_Aq_Resize Class
	 *
	 * @since 1.0
	 *
	 * @param string $url     The URL of the image
	 * @param int    $width   The new width of the image
	 * @param int    $height  The new height of the image
	 * @param bool   $crop    To crop or not to crop, the question is now
	 * @param bool   $single  If true only returns the URL, if false returns array
	 * @param bool   $upscale If image not big enough for new size should it upscale
	 * @return mixed If $single is true return new image URL, if it is false return array
	 *               Array contains 0 = URL, 1 = width, 2 = height
	 */
	function heart_and_style_aq_resize( $url, $width = null, $height = null, $crop = null, $single = true, $upscale = false ) {

		 if( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'photon' ) ) {

			$args = array(
				'resize' => "$width,$height"
			);
			if ( $single == true ) {
				return jetpack_photon_url( $url, $args );
			} else {
				$image = array (
					0 => $img_url,
					1 => $width,
					2 => $height
				);
				return jetpack_photon_url( $url, $args );
			}

		} else {

			$aq_resize = Heart_And_Style_Aq_Resize::getInstance();
			return $aq_resize->process( $url, $width, $height, $crop, $single, $upscale );
			
		}

	}

}

/**
 * Check whether a post is older than
 *
 * @since 1.0
 */
function heart_and_style_post_older_than( $post_ID, $days = 5 ) {

	$days = (int) $days;
	$offset = $days*60*60*24;

	if ( get_post_time( 'U', false, $post_ID ) < date('U') - $offset )
		return true;
	else
		return false;

}

/**
 * Returns amount of social shares a page has
 *
 * @since 1.0
 *
 * @param int     $post_ID ID of the post/page. Default false, uses get_the_ID()
 * @param int     $refresh_in Amount of seconds for cached info to be stored. Default 3600.
 * @return array  Array containing amount of shares. Keys are fb, twitter and pinterest. 
 */
function heart_and_style_get_social_count( $post_ID = false, $refresh_in = 3600 ) {

	// If ID nt supplied use current
	if ( $post_ID == false ) {
		$post_ID = get_the_ID();
	}	

	// if post older than 7 days
	if ( heart_and_style_post_older_than( $post_ID, 7 ) ) {
		$refresh_in = 14400;
	}

	// if post older than 14 days
	if ( heart_and_style_post_older_than( $post_ID, 14 ) ) {
		$refresh_in = 28800;
	}

	// if post older than 30 days
	if ( heart_and_style_post_older_than( $post_ID, 30 ) ) {
		$refresh_in = 57600;
	}

	// Transient
	$transient_id = 'heart_and_style_social_shares_count_' . $post_ID;

	if ( false === ( $share_info = get_transient( $transient_id ) ) ) {

		$the_url = get_permalink( $post_ID );

		// Defaults
		$share_info = array(
			'fb' => 0,
			'twitter' => 0,
			'pinterest' => 0
		);

		// Get stored shares
		$stored_shares = get_post_meta( get_the_ID(), '_heart_and_style_social_shares', true );
		if ( $stored_shares ) {
			$share_info = array(
				'fb' => $stored_shares['fb'],
				'twitter' => $stored_shares['twitter'],
				'pinterest' => $stored_shares['pinterest'],
			);
		}

		// Facebook
		$fb_get = wp_remote_get( 'http://graph.facebook.com/?id=' . $the_url );
		if ( is_array( $fb_get ) ) {
			$fb_get_body = json_decode( $fb_get['body'] );
			if ( isset( $fb_get_body->shares ) ) {
				$share_info['fb'] = $fb_get_body->shares;
			}
		}

		// Twitter									
		$twitter_get = wp_remote_get( 'http://opensharecount.com/count.json?url=' . $the_url );
		if ( is_array( $twitter_get ) ) {
			$twitter_get_body = json_decode( $twitter_get['body'] );
			if ( isset( $twitter_get_body->count ) ) {
				$share_info['twitter'] = $twitter_get_body->count;
			}
		}

		// Pinterest 
		$pinterest_get = wp_remote_get( 'http://api.pinterest.com/v1/urls/count.json?url=' . $the_url );
		if ( is_array( $pinterest_get ) ) {
			$pinterest_get_body = json_decode( preg_replace('/^receiveCount\((.*)\)$/', "\\1", $pinterest_get['body'] ) );
			if ( isset( $pinterest_get_body->count ) ) {
				$share_info['pinterest'] = $pinterest_get_body->count;
			}
		}

		// Update post meta
		update_post_meta( $post_ID, '_heart_and_style_social_shares', $share_info );

		// Check if there is data
		set_transient( $transient_id, $share_info, $refresh_in );

	}

	// Pass the data back
	return $share_info;

}

/**
 * Returns customizer option value
 *
 * @since 1.0
 */
function heart_and_style_get_theme_mod( $option_id, $default = '' ) {

	$return = get_theme_mod( HEART_AND_STYLE_CUSTOMIZER_PREPEND . $option_id, $default );
	if ( $return == '' ) { $return = $default; }

	return $return;

}

/**
 * Returns post meta value
 *
 * @since 1.0
 */
function heart_and_style_get_post_meta( $post_id, $option_id ) {

	$option_id = '_heart_and_style_' . $option_id;

	return get_post_meta( $post_id, $option_id , true );

}

/**
 * Returns the ALT attribute for an attachment
 *
 * @since 1.0
 *
 * @param string   $attachment_ID The ID of the attachment
 * @return string  The ALT attribute text
 */
function heart_and_style_get_attachment_alt( $attachment_ID ) {

	// Get ALT
	$thumb_alt = trim( strip_tags( get_post_meta( $attachment_ID, '_wp_attachment_image_alt', true) ) );
	
	// No ALT supplied get attachment info
	if ( empty( $thumb_alt ) )
		$attachment = get_post( $attachment_ID );
	
	// Use caption if no ALT supplied
	if ( empty( $thumb_alt ) )
		$thumb_alt = trim(strip_tags( $attachment->post_excerpt ));
	
	// Use title if no caption supplied either
	if ( empty( $thumb_alt ) )
		$thumb_alt = trim(strip_tags( $attachment->post_title ));

	// Return ALT
	return esc_attr( $thumb_alt );

}

/**
 * Add new classes to body
 *
 * @since 1.0
 */
function heart_and_style_body_class( $classes ) {

	// sticky sidebar
	$classes[] = 'sticky-sidebar-' . heart_and_style_get_theme_mod( 'sidebar_sticky_state', 'enabled' );

	// sticky header
	$classes[] = 'sticky-header-' . heart_and_style_get_theme_mod( 'header_sticky_state', 'enabled' );

	// Pass it back to WP
	return $classes;

} add_filter( 'body_class','heart_and_style_body_class' );

/**
 * Increment Count
 *
 * Stored in post meta. viewed_count for total, viewed_count_daily for today, _daily_date for current date.
 * 
 * @since 1.0
 */
function heart_and_style_view_count_increment( $post_id = false ) {

	// if ID not supplied get the ID
	if ( ! $post_id ) 
		$post_id = get_the_ID();

	// if still no ID give up
	if ( ! $post_id )
		return;

	/**
	 * Total Count
	 */

	// Current total count
	$current_count = 0;
	if ( get_post_meta( $post_id, 'meridian_viewed_count', true ) ) {
		$current_count = get_post_meta( $post_id, 'meridian_viewed_count', true );
	}

	// Increase and update total count
	$current_count++;
	update_post_meta( $post_id, 'meridian_viewed_count', $current_count );		

	/**
	 * Current Day Count
	 */

	// Current day count
	$current_day = date( 'Y-m-d', current_time( 'timestamp' ) );
	$daily_count = 0;
	if ( get_post_meta( $post_id, 'meridian_viewed_count_daily', true ) ) {
		$daily_count = get_post_meta( $post_id, 'meridian_viewed_count_daily', true );
	}

	// Stored day
	$current_stored_day = $current_day;
	if ( get_post_meta( $post_id, '_meridian_daily_date', true ) ) {
		$current_stored_day = get_post_meta( $post_id, '_meridian_daily_date', true );
	} else {
		update_post_meta( $post_id, '_meridian_daily_date', $current_day );
	}

	// If current day is equal to current stored date increment
	if ( $current_stored_day == $current_day ) {
		$daily_count++;
		update_post_meta( $post_id, 'meridian_viewed_count_daily', $daily_count );		
	// If not set count back to 1 and update the current stored day
	} else {
		update_post_meta( $post_id, 'meridian_viewed_count_daily', 1 );		
		update_post_meta( $post_id, '_meridian_daily_date', $current_day );
	}

	return;

}