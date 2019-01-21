<?php

function heart_and_style_view_count_increment_ajax( $atts ) {

	// The array we'll pass back to the AJAX call
	$response = array();

	// The code of the template
	$postID = stripslashes( $_POST['mt_post_id'] );

	// Increment the count
	heart_and_style_view_count_increment( $postID );

	// Bye bye
	exit;

} add_action( 'wp_ajax_heart-and-style-increment-viewcount', 'heart_and_style_view_count_increment_ajax' ); add_action( 'wp_ajax_nopriv_heart-and-style-increment-viewcount', 'heart_and_style_view_count_increment_ajax' );