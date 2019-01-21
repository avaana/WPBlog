<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( HEART_AND_STYLE_CMB2_PATH . '/init.php' ) ) {
	require_once HEART_AND_STYLE_CMB2_PATH . '/init.php';
}

/**
 * Register Post Options
 */
function heart_and_style_post_options() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_heart_and_style_';

	// Post Options

	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Post Options', 'heart-and-style' ),
		'object_types'  => array( 'post', ),
	) );

		$cmb_demo->add_field( array(
			'name'       => __( 'Banner Tagline', 'heart-and-style' ),
			'desc'       => __( 'This text will be shown just below the title on the single post pages.', 'heart-and-style' ),
			'id'         => $prefix . 'banner_tagline',
			'type'       => 'text',
		) );

		$cmb_demo->add_field( array(
			'name' => __( 'Banner Image', 'heart-and-style' ),
			'desc' => __( 'This image will be shown as the main banner background on single post pages. If not supplied the featured image will be used.', 'heart-and-style' ),
			'id'   => $prefix . 'banner_image',
			'type' => 'file',
		) );

		$cmb_demo->add_field( array(
			'name'       => __( 'Gallery Height', 'heart-and-style' ),
			'desc'       => __( 'The height to which the gallery images will be resized. Defaults to 230 pixels.', 'heart-and-style' ),
			'id'         => $prefix . 'gallery_height',
			'default'    => '230',
			'type'       => 'text',
		) );

		$gallery_group_field = $cmb_demo->add_field( array(
			'id'          => $prefix . 'gallery_images',
			'name'        => 'Gallery Images',
			'type'        => 'group',
			'description' => __( 'Output the gallery by adding [heart_and_style_gallery] shortcode in the post content.', 'heart-and-style' ),
			'repeatable'  => true, // use false if you want non-repeatable group
			'options'     => array(
				'group_title'   => __( 'Image {#}', 'heart-and-style' ), // since version 1.1.4, {#} gets replaced by row number
				'add_button'    => __( 'Add Image', 'heart-and-style' ),
				'remove_button' => __( 'Remove Image', 'heart-and-style' ),
				'sortable'      => true,
				'closed'        => true
			),
		) );

			$cmb_demo->add_group_field( $gallery_group_field, array(
				'name' => 'Image',
				'description' => 'Choose the image.',
				'id'   => 'image',
				'type' => 'file',
			) );

			$cmb_demo->add_group_field( $gallery_group_field, array(
				'name' => 'Size',
				'description' => 'Choose the width size for this image.',
				'id'   => 'size',
				'type' => 'select',
				'default' => 'custom',
				'options' => array(
					'1/3' => __( 'One Third', 'heart-and-style' ),
					'1/2'   => __( 'One Half', 'heart-and-style' ),
					'2/3'     => __( 'Two Thirds', 'heart-and-style' ),
					'1/1'     => __( 'Full', 'heart-and-style' ),
				),
			) );

	// Homepage Options

	$cmb_demo_2 = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_page',
		'title'         => __( 'Homepage Options', 'heart-and-style' ),
		'object_types'  => array( 'page', ),
	) );

		$cmb_demo_2->add_field( array(
			'name'       => __( 'Posts Per Page', 'heart-and-style' ),
			'desc'       => __( 'Amount of posts to be displayed per page ( per "load more" ). If not supplied it will show the amount we thought was best for the given home page template.', 'heart-and-style' ),
			'id'         => $prefix . 'query_posts_per_page',
			'type'       => 'text',
		) );

} add_action( 'cmb2_admin_init', 'heart_and_style_post_options' );
