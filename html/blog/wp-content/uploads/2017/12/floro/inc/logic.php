<?php
/**
 * Logic related functions
 *
 * @package Floro
 * @since Floro 1.0
 */

/**
 * Table Of Contents
 *
 * floro_get_option ( Returns customizer option value )
 * floro_get_post_meta ( Returns post meta value )
 */

if ( ! function_exists( 'floro_get_option' ) ) {

	/**
	 * Returns customizer option value
	 *
	 * @since 1.0
	 */
	function floro_get_option( $option_id, $default = '' ) {

		$return = get_option( FLORO_CUSTOMIZER_PREPEND . $option_id, $default );
		if ( $return == '' ) { $return = $default; }

		return $return;

	}

}

if ( ! function_exists( 'floro_get_post_meta' ) ) {

	/**
	 * Returns post meta value
	 *
	 * @since 1.0
	 */
	function floro_get_post_meta( $post_id, $option_id ) {

		$option_id = '_floro_' . $option_id;

		return get_post_meta( $post_id, $option_id , true );

	}

}